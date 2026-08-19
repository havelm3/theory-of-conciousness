<?php
declare(strict_types=1);

/**
 * build.php – sloučí zdrojové kapitoly DPSH do jednoho dokumentu pro čtečku.
 *
 * Zdroje jsou očekávány ve složkách 01/, 02/, … 15/, jeden soubor na kapitolu,
 * pojmenovaný podle vzoru:
 *
 *     NN - <anglický název> <LANG> - vX.Y.Z.md
 *
 * Verzování: --version přijímá prefix. --version=1 vezme v každé složce
 * nejvyšší dostupnou verzi 1.*.*, --version=1.0 nejvyšší 1.0.*, --version=1.0.0
 * právě tuto verzi. Bez parametru se použije nejvyšší verze nalezená v repozitáři.
 *
 * Použití:
 *     php build.php                      # nejnovější verze, všechny formáty
 *     php build.php --version=1
 *     php build.php --version=1.0.0 --format=epub
 *     php build.php --list               # jen vypíše, co by se použilo
 *     php build.php --help
 */

const APP = 'build.php';

// ---------------------------------------------------------------------------
// CLI
// ---------------------------------------------------------------------------

/** @return array<string,string|bool> */
function parseArgs(array $argv): array
{
    $opts = [];
    foreach (array_slice($argv, 1) as $arg) {
        if (!str_starts_with($arg, '--')) {
            fail("Neznámý argument: {$arg} (podporovány jsou jen --volby)");
        }
        $arg = substr($arg, 2);
        if (str_contains($arg, '=')) {
            [$k, $v] = explode('=', $arg, 2);
            $opts[$k] = $v;
        } else {
            $opts[$arg] = true;
        }
    }
    return $opts;
}

function fail(string $msg, int $code = 1): never
{
    fwrite(STDERR, "CHYBA: {$msg}\n");
    exit($code);
}

function info(string $msg): void
{
    fwrite(STDOUT, $msg . "\n");
}

function warn(string $msg): void
{
    fwrite(STDERR, "POZOR: {$msg}\n");
}

function usage(): never
{
    $u = <<<TXT
    {$GLOBALS['argv'][0]} – build DPSH dokumentu pro čtečku

    VOLBY
      --version=PREFIX   verze zdrojů: 1 | 1.0 | 1.0.0 (výchozí: nejvyšší nalezená)
      --lang=CZ          jazyková varianta zdrojů (výchozí: CZ)
      --format=LIST      epub,html,md nebo all (výchozí: all)
      --src=DIR          kořen se složkami kapitol (výchozí: adresář skriptu)
      --out=DIR          výstupní adresář (výchozí: dist)
      --title=TEXT       titul dokumentu
      --author=TEXT      autor
      --toc-depth=N      1 = jen kapitoly, 2 = i sekce (výchozí: 2)
      --list             vypíše vybrané zdroje a skončí
      --strict           skončí chybou, pokud některá složka kapitolu nemá
      --help             tato nápověda

    PŘÍKLADY
      php build.php
      php build.php --version=1 --format=epub
      php build.php --version=1.0.0 --toc-depth=1 --out=/tmp/dpsh
    TXT;
    info($u);
    exit(0);
}

// ---------------------------------------------------------------------------
// Zdroje a verze
// ---------------------------------------------------------------------------

/**
 * Rozebere název souboru na části. Vrací null, pokud neodpovídá vzoru.
 *
 * @return array{chapter:int,title:string,lang:string,version:array{int,int,int},versionText:string}|null
 */
function parseSourceName(string $basename): ?array
{
    $re = '/^(\d{2})\s*-\s*(.+?)\s+([A-Za-z]{2})\s*-\s*v\s*(\d+)\.(\d+)\.(\d+)\.md$/u';
    if (!preg_match($re, $basename, $m)) {
        return null;
    }
    return [
        'chapter'     => (int) $m[1],
        'title'       => trim($m[2]),
        'lang'        => strtoupper($m[3]),
        'version'     => [(int) $m[4], (int) $m[5], (int) $m[6]],
        'versionText' => "{$m[4]}.{$m[5]}.{$m[6]}",
    ];
}

/** @return int -1|0|1 */
function versionCompare(array $a, array $b): int
{
    return [$a[0], $a[1], $a[2]] <=> [$b[0], $b[1], $b[2]];
}

/** Odpovídá verze zadanému prefixu? Prefix null = ano. */
function versionMatchesPrefix(array $v, ?array $prefix): bool
{
    if ($prefix === null) {
        return true;
    }
    foreach ($prefix as $i => $p) {
        if ($v[$i] !== $p) {
            return false;
        }
    }
    return true;
}

/** @return array<int,int>|null */
function parseVersionPrefix(string $text): ?array
{
    if (!preg_match('/^v?(\d+)(?:\.(\d+))?(?:\.(\d+))?$/', trim($text), $m)) {
        return null;
    }
    $out = [(int) $m[1]];
    if (isset($m[2]) && $m[2] !== '') {
        $out[] = (int) $m[2];
    }
    if (isset($m[3]) && $m[3] !== '') {
        $out[] = (int) $m[3];
    }
    return $out;
}

/**
 * Projde složky kapitol a vrátí všechny zdroje, které odpovídají jazyku.
 *
 * @return array<int,array<int,array>> chapter => list of source records
 */
function discoverSources(string $src, string $lang): array
{
    if (!is_dir($src)) {
        fail("Zdrojový adresář neexistuje: {$src}");
    }
    $found = [];
    foreach (scandir($src) ?: [] as $entry) {
        if (!preg_match('/^\d{2}$/', $entry)) {
            continue;
        }
        $dir = $src . DIRECTORY_SEPARATOR . $entry;
        if (!is_dir($dir)) {
            continue;
        }
        foreach (scandir($dir) ?: [] as $file) {
            if (!str_ends_with(strtolower($file), '.md')) {
                continue;
            }
            $meta = parseSourceName($file);
            if ($meta === null) {
                warn("Přeskočen soubor s nerozpoznaným názvem: {$entry}/{$file}");
                continue;
            }
            if ($meta['lang'] !== $lang) {
                continue;
            }
            if ($meta['chapter'] !== (int) $entry) {
                warn("Číslo v názvu ({$meta['chapter']}) nesouhlasí se složkou {$entry}: {$file}");
            }
            $meta['path'] = $dir . DIRECTORY_SEPARATOR . $file;
            $meta['rel']  = $entry . '/' . $file;
            $found[(int) $entry][] = $meta;
        }
    }
    ksort($found);
    return $found;
}

/**
 * Vybere pro každou kapitolu jeden zdroj podle verzního prefixu.
 *
 * @return array{sources:array<int,array>,resolved:string,skipped:array<int,string>}
 */
function selectSources(array $found, ?array $prefix): array
{
    // Bez zadané verze: nejvyšší major, který se v repozitáři vyskytuje.
    // V rámci něj se u každé kapitoly použije nejvyšší dostupná revize, takže
    // oprava jedné kapitoly na v1.0.1 se do buildu dostane bez dalších parametrů.
    if ($prefix === null) {
        $major = null;
        foreach ($found as $list) {
            foreach ($list as $s) {
                if ($major === null || $s['version'][0] > $major) {
                    $major = $s['version'][0];
                }
            }
        }
        if ($major === null) {
            fail('Nenalezen žádný zdrojový soubor.');
        }
        $prefix = [$major];
    }

    $sources = [];
    $skipped = [];
    foreach ($found as $chapter => $list) {
        $match = null;
        foreach ($list as $s) {
            if (!versionMatchesPrefix($s['version'], $prefix)) {
                continue;
            }
            if ($match === null || versionCompare($s['version'], $match['version']) > 0) {
                $match = $s;
            }
        }
        if ($match === null) {
            $skipped[$chapter] = sprintf(
                'kapitola %02d nemá zdroj pro verzi %s (k dispozici: %s)',
                $chapter,
                implode('.', $prefix),
                implode(', ', array_map(fn($s) => $s['versionText'], $list)) ?: 'nic'
            );
            continue;
        }
        $sources[$chapter] = $match;
    }
    if ($sources === []) {
        fail('Pro verzi ' . implode('.', $prefix) . ' nebyl nalezen žádný zdroj.');
    }
    ksort($sources);

    // Rozlišená verze = nejvyšší skutečně použitá.
    $top = null;
    foreach ($sources as $s) {
        if ($top === null || versionCompare($s['version'], $top) > 0) {
            $top = $s['version'];
        }
    }

    return ['sources' => $sources, 'resolved' => implode('.', $top), 'skipped' => $skipped];
}

// ---------------------------------------------------------------------------
// Markdown → HTML
// ---------------------------------------------------------------------------

final class Heading
{
    public function __construct(
        public int $level,
        public string $text,
        public string $id,
        public int $chapter,
    ) {
    }
}

final class MarkdownConverter
{
    /** @var Heading[] */
    public array $headings = [];

    public function __construct(private int $chapter)
    {
    }

    public function convert(string $md): string
    {
        $lines = preg_split('/\R/u', $md) ?: [];
        return $this->blocks($lines, true);
    }

    /** @param string[] $lines */
    private function blocks(array $lines, bool $collectHeadings): string
    {
        $out = [];
        $n   = count($lines);
        $i   = 0;

        while ($i < $n) {
            $line = $lines[$i];

            if (trim($line) === '') {
                $i++;
                continue;
            }

            // Kódový blok / diagram
            if (preg_match('/^```/', $line)) {
                $i++;
                $buf = [];
                while ($i < $n && !preg_match('/^```/', $lines[$i])) {
                    $buf[] = $lines[$i];
                    $i++;
                }
                $i++; // uzavírací fence
                while ($buf !== [] && trim(end($buf)) === '') {
                    array_pop($buf);
                }
                $out[] = '<pre class="dgm">' . self::esc(implode("\n", $buf)) . '</pre>';
                continue;
            }

            // Nadpis
            if (preg_match('/^(#{1,6})\s+(.*)$/u', $line, $m)) {
                $level = strlen($m[1]);
                $text  = trim($m[2]);
                $id    = $this->headingId($text, $level);
                if ($collectHeadings) {
                    $this->headings[] = new Heading($level, $text, $id, $this->chapter);
                }
                $out[] = sprintf(
                    '<h%d id="%s">%s</h%d>',
                    $level,
                    self::esc($id),
                    $this->inline($text),
                    $level
                );
                $i++;
                continue;
            }

            // Citace
            if (preg_match('/^>(\s|$)/', $line)) {
                $buf = [];
                while ($i < $n && preg_match('/^>(\s|$)/', $lines[$i])) {
                    $buf[] = preg_replace('/^>\s?/', '', $lines[$i]) ?? '';
                    $i++;
                }
                $out[] = '<blockquote>' . $this->blocks($buf, false) . '</blockquote>';
                continue;
            }

            // Číslovaný seznam
            if (preg_match('/^(\d+)\.\s+/', $line, $m)) {
                $start = (int) $m[1];
                $items = $this->listItems($lines, $i, '/^\d+\.\s+/');
                $attr  = $start !== 1 ? ' start="' . $start . '"' : '';
                $out[] = '<ol' . $attr . '>' . implode('', array_map(
                    fn(string $t) => '<li>' . $this->inline($t) . '</li>',
                    $items
                )) . '</ol>';
                continue;
            }

            // Odrážkový seznam
            if (preg_match('/^-\s+/', $line)) {
                $items = $this->listItems($lines, $i, '/^-\s+/');
                $out[] = '<ul>' . implode('', array_map(
                    fn(string $t) => '<li>' . $this->inline($t) . '</li>',
                    $items
                )) . '</ul>';
                continue;
            }

            // Odstavec – zdroje jsou zalomené na ~75 znaků, řádky se spojují
            $buf = [];
            while ($i < $n && trim($lines[$i]) !== '' && !$this->startsBlock($lines[$i])) {
                $buf[] = trim($lines[$i]);
                $i++;
            }
            $out[] = '<p>' . $this->inline(implode(' ', $buf)) . '</p>';
        }

        return implode("\n", $out);
    }

    private function startsBlock(string $line): bool
    {
        return (bool) preg_match('/^(```|#{1,6}\s|>|\d+\.\s|-\s)/u', $line);
    }

    /**
     * Posbírá položky seznamu včetně pokračovacích řádků.
     *
     * @param string[] $lines
     * @return string[]
     */
    private function listItems(array $lines, int &$i, string $marker): array
    {
        $items = [];
        $n     = count($lines);
        while ($i < $n) {
            $line = $lines[$i];
            if (preg_match($marker, $line)) {
                $items[] = trim((string) preg_replace($marker, '', $line));
                $i++;
                continue;
            }
            // pokračování položky: odsazený neprázdný řádek
            if ($items !== [] && trim($line) !== '' && preg_match('/^\s+\S/', $line)) {
                $items[count($items) - 1] .= ' ' . trim($line);
                $i++;
                continue;
            }
            break;
        }
        return $items;
    }

    private function headingId(string $text, int $level): string
    {
        if (preg_match('/^(\d+)\.(\d+)\b/', $text, $m)) {
            return "sec-{$m[1]}-{$m[2]}";
        }
        if ($level === 1 && preg_match('/^(\d+)\./', $text, $m)) {
            return "ch-{$m[1]}";
        }
        $slug = strtolower(self::translit($text));
        $slug = (string) preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');
        return "h{$this->chapter}-" . ($slug !== '' ? $slug : 'x') . '-' . substr(md5($text), 0, 6);
    }

    private function inline(string $text): string
    {
        // 1) kódové úseky odložíme, aby v nich nefungovalo zvýrazňování
        $codes = [];
        $text  = preg_replace_callback('/`([^`]+)`/u', function (array $m) use (&$codes): string {
            $codes[] = $m[1];
            return "\x00C" . (count($codes) - 1) . "\x00";
        }, $text) ?? $text;

        // 2) escape
        $text = self::esc($text);

        // 3) zvýraznění (nejdřív **, pak *)
        $text = preg_replace('/\*\*(?=\S)(.+?)(?<=\S)\*\*/su', '<strong>$1</strong>', $text) ?? $text;
        $text = preg_replace('/(?<!\*)\*(?=\S)([^*]+?)(?<=\S)\*(?!\*)/su', '<em>$1</em>', $text) ?? $text;

        // 4) vrátíme kód
        return preg_replace_callback('/\x00C(\d+)\x00/', function (array $m) use ($codes): string {
            return '<code>' . self::esc($codes[(int) $m[1]]) . '</code>';
        }, $text) ?? $text;
    }

    private static function esc(string $s): string
    {
        return htmlspecialchars($s, ENT_QUOTES | ENT_XML1 | ENT_SUBSTITUTE, 'UTF-8');
    }

    private static function translit(string $s): string
    {
        $map = [
            'á' => 'a', 'č' => 'c', 'ď' => 'd', 'é' => 'e', 'ě' => 'e', 'í' => 'i',
            'ň' => 'n', 'ó' => 'o', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ú' => 'u',
            'ů' => 'u', 'ý' => 'y', 'ž' => 'z',
        ];
        return strtr(mb_strtolower($s, 'UTF-8'), $map);
    }
}

// ---------------------------------------------------------------------------
// Výstupy
// ---------------------------------------------------------------------------

const CSS = <<<'CSS'
html { font-size: 100%; }
body {
  font-family: Georgia, "Times New Roman", serif;
  line-height: 1.45;
  margin: 0 auto;
  padding: 0 1em;
  max-width: 34em;
  text-align: left;
  hyphens: auto;
}
h1, h2, h3 {
  font-family: Helvetica, Arial, sans-serif;
  line-height: 1.25;
  page-break-after: avoid;
  break-after: avoid;
}
h1 {
  font-size: 1.5em;
  margin: 0 0 1.2em;
  page-break-before: always;
  break-before: page;
}
h2 { font-size: 1.12em; margin: 1.8em 0 0.6em; }
h3 { font-size: 1em; margin: 1.4em 0 0.5em; font-style: italic; }
p { margin: 0 0 0.7em; text-indent: 0; orphans: 2; widows: 2; }
blockquote {
  margin: 1em 0;
  padding: 0.2em 0 0.2em 0.9em;
  border-left: 3px solid #888;
  font-style: normal;
}
blockquote p { margin: 0 0 0.5em; }
blockquote p:last-child { margin-bottom: 0; }
pre.dgm {
  font-family: "DejaVu Sans Mono", "Liberation Mono", Courier, monospace;
  font-size: 0.72em;
  line-height: 1.3;
  white-space: pre-wrap;
  overflow-x: auto;
  margin: 0.9em 0;
  padding: 0.5em 0.6em;
  background: #f2f2f2;
  border-radius: 3px;
  page-break-inside: avoid;
  break-inside: avoid;
}
code { font-family: "DejaVu Sans Mono", "Liberation Mono", Courier, monospace; font-size: 0.85em; }
ol, ul { margin: 0 0 0.8em 1.4em; padding: 0; }
li { margin: 0 0 0.3em; }
nav#toc ol { list-style: none; margin-left: 0.9em; }
nav#toc > ol { margin-left: 0; }
nav#toc a { text-decoration: none; }
.titlepage { text-align: center; margin-top: 25%; }
.titlepage h1 { page-break-before: avoid; break-before: avoid; font-size: 1.9em; }
.titlepage .sub { font-style: italic; margin-bottom: 2.5em; }
.titlepage .meta { font-size: 0.9em; color: #444; }
CSS;

function xhtmlPage(string $title, string $body, string $cssHref): string
{
    $t = htmlspecialchars($title, ENT_QUOTES | ENT_XML1, 'UTF-8');
    return <<<XML
    <?xml version="1.0" encoding="utf-8"?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
    <head>
      <meta charset="utf-8"/>
      <title>{$t}</title>
      <link rel="stylesheet" type="text/css" href="{$cssHref}"/>
    </head>
    <body>
    {$body}
    </body>
    </html>
    XML;
}

/** @param array<int,array{meta:array,html:string,headings:Heading[]}> $chapters */
function buildTocHtml(array $chapters, int $depth, bool $epub): string
{
    $out = ['<nav id="toc"' . ($epub ? ' epub:type="toc"' : '') . '>'];
    $out[] = '<h1>Obsah</h1>';
    $out[] = '<ol>';
    foreach ($chapters as $ch => $c) {
        $href = $epub ? sprintf('ch%02d.xhtml', $ch) : '';
        $h1   = null;
        foreach ($c['headings'] as $h) {
            if ($h->level === 1) {
                $h1 = $h;
                break;
            }
        }
        $label = $h1 ? $h1->text : $c['meta']['title'];
        $anchor = $h1 ? $h1->id : sprintf('ch-%d', $ch);
        $out[] = '<li><a href="' . $href . '#' . htmlspecialchars($anchor, ENT_QUOTES | ENT_XML1, 'UTF-8') . '">'
            . htmlspecialchars($label, ENT_QUOTES | ENT_XML1, 'UTF-8') . '</a>';
        if ($depth >= 2) {
            $subs = array_filter($c['headings'], fn(Heading $h) => $h->level === 2);
            if ($subs !== []) {
                $out[] = '<ol>';
                foreach ($subs as $s) {
                    $out[] = '<li><a href="' . $href . '#' . htmlspecialchars($s->id, ENT_QUOTES | ENT_XML1, 'UTF-8') . '">'
                        . htmlspecialchars($s->text, ENT_QUOTES | ENT_XML1, 'UTF-8') . '</a></li>';
                }
                $out[] = '</ol>';
            }
        }
        $out[] = '</li>';
    }
    $out[] = '</ol>';
    $out[] = '</nav>';
    return implode("\n", $out);
}

function titlePageBody(string $title, string $subtitle, string $author, string $version, string $date): string
{
    $e = fn(string $s): string => htmlspecialchars($s, ENT_QUOTES | ENT_XML1, 'UTF-8');
    return '<section class="titlepage">'
        . '<h1>' . $e($title) . '</h1>'
        . '<p class="sub">' . $e($subtitle) . '</p>'
        . '<p class="meta">' . $e($author) . '<br/>verze ' . $e($version) . '<br/>' . $e($date) . '</p>'
        . '</section>';
}

/** @param array<int,array> $chapters */
function writeMergedMarkdown(string $path, array $chapters, string $title, string $subtitle, string $author, string $version, string $date): void
{
    $parts = [];
    $parts[] = "# {$title}\n\n*{$subtitle}*\n\n{$author}  \nverze {$version}  \n{$date}\n";
    $parts[] = "---\n";
    $toc = ["## Obsah\n"];
    foreach ($chapters as $ch => $c) {
        $h1 = null;
        foreach ($c['headings'] as $h) {
            if ($h->level === 1) {
                $h1 = $h;
                break;
            }
        }
        $toc[] = '- ' . ($h1 ? $h1->text : $c['meta']['title']);
    }
    $parts[] = implode("\n", $toc) . "\n";
    $parts[] = "---\n";
    foreach ($chapters as $c) {
        $parts[] = rtrim($c['md']) . "\n";
    }
    file_put_contents($path, implode("\n", $parts));
}

/** @param array<int,array> $chapters */
function writeSingleHtml(string $path, array $chapters, int $tocDepth, string $title, string $subtitle, string $author, string $version, string $date): void
{
    $body = titlePageBody($title, $subtitle, $author, $version, $date)
        . "\n" . buildTocHtml($chapters, $tocDepth, false) . "\n";
    foreach ($chapters as $c) {
        $body .= "\n<section>\n" . $c['html'] . "\n</section>\n";
    }
    $t   = htmlspecialchars($title . ' – v' . $version, ENT_QUOTES, 'UTF-8');
    $css = CSS;
    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="cs">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$t}</title>
    <style>
    {$css}
    </style>
    </head>
    <body>
    {$body}
    </body>
    </html>
    HTML;
    file_put_contents($path, $html);
}

/** @param array<int,array> $chapters */
function writeEpub(string $path, array $chapters, int $tocDepth, string $title, string $subtitle, string $author, string $version, string $date): void
{
    if (!class_exists('ZipArchive')) {
        fail('EPUB vyžaduje rozšíření zip (ZipArchive). Použij --format=html,md.');
    }
    if (file_exists($path) && !unlink($path)) {
        fail("Nelze přepsat {$path}");
    }

    $zip = new ZipArchive();
    if ($zip->open($path, ZipArchive::CREATE) !== true) {
        fail("Nelze vytvořit {$path}");
    }

    // mimetype musí být první a nekomprimovaný
    $zip->addFromString('mimetype', 'application/epub+zip');
    $zip->setCompressionName('mimetype', ZipArchive::CM_STORE);

    $zip->addFromString('META-INF/container.xml', <<<XML
    <?xml version="1.0" encoding="utf-8"?>
    <container version="1.0" xmlns="urn:oasis:names:tc:opendocument:xmlns:container">
      <rootfiles>
        <rootfile full-path="OEBPS/content.opf" media-type="application/oebps-package+xml"/>
      </rootfiles>
    </container>
    XML);

    $zip->addFromString('OEBPS/style.css', CSS);

    // titulní strana
    $zip->addFromString(
        'OEBPS/title.xhtml',
        xhtmlPage($title, titlePageBody($title, $subtitle, $author, $version, $date), 'style.css')
    );

    // kapitoly
    $manifest = [];
    $spine    = [];
    foreach ($chapters as $ch => $c) {
        $file = sprintf('ch%02d.xhtml', $ch);
        $h1   = null;
        foreach ($c['headings'] as $h) {
            if ($h->level === 1) {
                $h1 = $h;
                break;
            }
        }
        $zip->addFromString('OEBPS/' . $file, xhtmlPage($h1 ? $h1->text : $c['meta']['title'], $c['html'], 'style.css'));
        $id         = sprintf('ch%02d', $ch);
        $manifest[] = '    <item id="' . $id . '" href="' . $file . '" media-type="application/xhtml+xml"/>';
        $spine[]    = '    <itemref idref="' . $id . '"/>';
    }

    // navigace EPUB 3
    $navBody = buildTocHtml($chapters, $tocDepth, true);
    $nav = str_replace(
        '<html xmlns="http://www.w3.org/1999/xhtml"',
        '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:epub="http://www.idpf.org/2007/ops"',
        xhtmlPage('Obsah', $navBody, 'style.css')
    );
    $zip->addFromString('OEBPS/nav.xhtml', $nav);

    // NCX pro starší čtečky
    $uid  = 'urn:uuid:' . uuidFromString($title . '|' . $version);
    $navPoints = [];
    $order = 1;
    $navPoints[] = ncxPoint('np-title', $order++, $title, 'title.xhtml');
    foreach ($chapters as $ch => $c) {
        $h1 = null;
        foreach ($c['headings'] as $h) {
            if ($h->level === 1) {
                $h1 = $h;
                break;
            }
        }
        $navPoints[] = ncxPoint(
            sprintf('np-ch%02d', $ch),
            $order++,
            $h1 ? $h1->text : $c['meta']['title'],
            sprintf('ch%02d.xhtml', $ch)
        );
    }
    $ncxTitle = htmlspecialchars($title, ENT_QUOTES | ENT_XML1, 'UTF-8');
    $zip->addFromString('OEBPS/toc.ncx', <<<XML
    <?xml version="1.0" encoding="utf-8"?>
    <ncx xmlns="http://www.daisy.org/z3986/2005/ncx/" version="2005-1">
      <head>
        <meta name="dtb:uid" content="{$uid}"/>
        <meta name="dtb:depth" content="1"/>
        <meta name="dtb:totalPageCount" content="0"/>
        <meta name="dtb:maxPageNumber" content="0"/>
      </head>
      <docTitle><text>{$ncxTitle}</text></docTitle>
      <navMap>
    XML . "\n" . implode("\n", $navPoints) . "\n  </navMap>\n</ncx>\n");

    // OPF
    $esc       = fn(string $s): string => htmlspecialchars($s, ENT_QUOTES | ENT_XML1, 'UTF-8');
    $eTitle    = $esc($title);
    $eAuthor   = $esc($author);
    $eDate     = $esc($date);
    $eSubtitle = $esc($subtitle);
    $eVersion  = $esc($version);
    $modified  = gmdate('Y-m-d\TH:i:s\Z');
    $manifestS = implode("\n", $manifest);
    $spineS    = implode("\n", $spine);
    $zip->addFromString('OEBPS/content.opf', <<<XML
    <?xml version="1.0" encoding="utf-8"?>
    <package xmlns="http://www.idpf.org/2007/opf" version="3.0" unique-identifier="pub-id" xml:lang="cs">
      <metadata xmlns:dc="http://purl.org/dc/elements/1.1/">
        <dc:identifier id="pub-id">{$uid}</dc:identifier>
        <dc:title>{$eTitle}</dc:title>
        <dc:creator>{$eAuthor}</dc:creator>
        <dc:language>cs</dc:language>
        <dc:date>{$eDate}</dc:date>
        <dc:description>{$eSubtitle}</dc:description>
        <meta property="dcterms:modified">{$modified}</meta>
        <meta property="schema:version">{$eVersion}</meta>
      </metadata>
      <manifest>
        <item id="nav" href="nav.xhtml" media-type="application/xhtml+xml" properties="nav"/>
        <item id="ncx" href="toc.ncx" media-type="application/x-dtbncx+xml"/>
        <item id="css" href="style.css" media-type="text/css"/>
        <item id="title" href="title.xhtml" media-type="application/xhtml+xml"/>
    {$manifestS}
      </manifest>
      <spine toc="ncx">
        <itemref idref="title"/>
        <itemref idref="nav"/>
    {$spineS}
      </spine>
    </package>
    XML);

    if (!$zip->close()) {
        fail("Zápis EPUB selhal: {$path}");
    }
}

function ncxPoint(string $id, int $order, string $label, string $src): string
{
    $l = htmlspecialchars($label, ENT_QUOTES | ENT_XML1, 'UTF-8');
    return "    <navPoint id=\"{$id}\" playOrder=\"{$order}\">\n"
        . "      <navLabel><text>{$l}</text></navLabel>\n"
        . "      <content src=\"{$src}\"/>\n"
        . '    </navPoint>';
}

/** Deterministické UUID v4-like, aby rebuild stejné verze měl stejné id. */
function uuidFromString(string $seed): string
{
    $h = md5($seed);
    return sprintf(
        '%s-%s-4%s-%s%s-%s',
        substr($h, 0, 8),
        substr($h, 8, 4),
        substr($h, 13, 3),
        dechex((hexdec($h[16]) & 0x3) | 0x8),
        substr($h, 17, 3),
        substr($h, 20, 12)
    );
}

// ---------------------------------------------------------------------------
// Main
// ---------------------------------------------------------------------------

$opts = parseArgs($argv);
if (isset($opts['help']) || isset($opts['h'])) {
    usage();
}

$scriptDir = __DIR__;
$src       = rtrim((string) ($opts['src'] ?? $scriptDir), DIRECTORY_SEPARATOR);
$outDir    = (string) ($opts['out'] ?? $scriptDir . DIRECTORY_SEPARATOR . 'dist');
$lang      = strtoupper((string) ($opts['lang'] ?? 'CZ'));
$tocDepth  = max(1, min(2, (int) ($opts['toc-depth'] ?? 2)));
$title     = (string) ($opts['title'] ?? 'Hypotéza dynamického perceptuálního stavu');
$subtitle  = 'Dynamic Perceptual State Hypothesis (DPSH)';
$author    = (string) ($opts['author'] ?? 'Michal Havelec');

$prefix = null;
if (isset($opts['version']) && $opts['version'] !== true) {
    $prefix = parseVersionPrefix((string) $opts['version']);
    if ($prefix === null) {
        fail('Neplatná verze: ' . $opts['version'] . ' (očekáváno 1, 1.0 nebo 1.0.0)');
    }
}

$formats = array_values(array_filter(array_map(
    'trim',
    explode(',', strtolower((string) ($opts['format'] ?? 'all')))
)));
if (in_array('all', $formats, true) || $formats === []) {
    $formats = ['epub', 'html', 'md'];
}
foreach ($formats as $f) {
    if (!in_array($f, ['epub', 'html', 'md'], true)) {
        fail("Neznámý formát: {$f} (epub, html, md nebo all)");
    }
}

$found    = discoverSources($src, $lang);
if ($found === []) {
    fail("Ve {$src} nejsou žádné složky kapitol se zdroji pro jazyk {$lang}.");
}
$selection = selectSources($found, $prefix);
$sources   = $selection['sources'];
$version   = $selection['resolved'];

if (count($selection['skipped']) > 3) {
    warn(sprintf(
        '%d kapitol nemá zdroj pro verzi %s: %s',
        count($selection['skipped']),
        implode('.', $prefix ?? []) ?: $version,
        implode(', ', array_map(fn(int $c) => sprintf('%02d', $c), array_keys($selection['skipped'])))
    ));
} else {
    foreach ($selection['skipped'] as $msg) {
        warn($msg);
    }
}
if ($selection['skipped'] !== [] && isset($opts['strict'])) {
    fail('--strict: build zastaven kvůli chybějícím kapitolám.');
}

if (isset($opts['list'])) {
    info("Jazyk: {$lang}   verze: {$version}   kapitol: " . count($sources));
    foreach ($sources as $ch => $s) {
        info(sprintf('  %02d  v%-8s %s', $ch, $s['versionText'], $s['rel']));
    }
    exit($selection['skipped'] === [] ? 0 : 1);
}

// Načtení a konverze
$chapters = [];
$sections = 0;
foreach ($sources as $ch => $s) {
    $md = file_get_contents($s['path']);
    if ($md === false) {
        fail("Nelze přečíst {$s['rel']}");
    }
    $conv = new MarkdownConverter($ch);
    $html = $conv->convert($md);
    $chapters[$ch] = [
        'meta'     => $s,
        'md'       => $md,
        'html'     => $html,
        'headings' => $conv->headings,
    ];
    $sections += count(array_filter($conv->headings, fn(Heading $h) => $h->level === 2));
}

if (!is_dir($outDir) && !mkdir($outDir, 0o777, true) && !is_dir($outDir)) {
    fail("Nelze vytvořit výstupní adresář: {$outDir}");
}

$date = gmdate('Y-m-d');
$base = sprintf('DPSH-%s-v%s', $lang, $version);
$made = [];

if (in_array('md', $formats, true)) {
    $p = $outDir . DIRECTORY_SEPARATOR . $base . '.md';
    writeMergedMarkdown($p, $chapters, $title, $subtitle, $author, $version, $date);
    $made[] = $p;
}
if (in_array('html', $formats, true)) {
    $p = $outDir . DIRECTORY_SEPARATOR . $base . '.html';
    writeSingleHtml($p, $chapters, $tocDepth, $title, $subtitle, $author, $version, $date);
    $made[] = $p;
}
if (in_array('epub', $formats, true)) {
    $p = $outDir . DIRECTORY_SEPARATOR . $base . '.epub';
    writeEpub($p, $chapters, $tocDepth, $title, $subtitle, $author, $version, $date);
    $made[] = $p;
}

info(sprintf(
    'Verze %s, jazyk %s: %d kapitol, %d sekcí.',
    $version,
    $lang,
    count($chapters),
    $sections
));
foreach ($made as $p) {
    info(sprintf('  %s  (%s)', $p, formatBytes((int) filesize($p))));
}

function formatBytes(int $b): string
{
    if ($b < 1024) {
        return $b . ' B';
    }
    if ($b < 1024 * 1024) {
        return round($b / 1024, 1) . ' kB';
    }
    return round($b / 1024 / 1024, 2) . ' MB';
}
