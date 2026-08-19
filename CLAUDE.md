# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repository is

This is **not a software project**. It is the source manuscript of a scientific
theory: the *Dynamic Perceptual State Hypothesis* (DPSH), a mechanistic theory
of how a continuous internal perceptual state can arise in a neuronal system.

The content is 15 hand-written Markdown chapters, in **Czech**, at version
`v1.0.0`, one per numbered folder `01/` … `15/`. The only code is `build.php`,
which merges the chapters into a single reader-ready document. There are no
dependencies, no tests, no CI — the meaningful verification of the *content* is
structural and conceptual consistency of the prose (see "Consistency checks").

The theory is written as a specification to be implemented later in a separate
simulation engine called **Cognia**, which does not live in this repo.

There is no bibliography. Passages that begin `Rešerše ukázala …` refer to an
external literature review that is not part of the repository; treat them as
unsourced claims rather than looking for a citation list.

## Build

`build.php` (PHP 8.1+, needs `zip` and `mbstring`) walks the `NN/` folders,
picks one source per chapter by version, converts Markdown to HTML and writes
to `dist/` (git-ignored):

```bash
php build.php                        # newest major, all three formats
php build.php --list                 # show which source each chapter resolves to
php build.php --version=1            # only v1.*.* sources, newest revision each
php build.php --version=1.0.0        # exactly v1.0.0 — reproducible build
php build.php --format=epub          # epub | html | md | all
php build.php --strict               # fail if any chapter lacks a matching source
php build.php --help
```

Outputs are `dist/DPSH-<LANG>-v<version>.{epub,html,md}`. The EPUB is the
e-reader target: one XHTML per chapter, EPUB 3 `nav.xhtml` plus an NCX fallback,
CSS tuned for e-ink (serif body, `pre-wrap` diagrams at 0.72em so ASCII
diagrams are never clipped). The single-file HTML is the same content for
browser/print, and the `.md` is the plain concatenation.

Version resolution is by **prefix**: `--version=1` means "highest `1.x.y` in
each folder", so revising one chapter to `v1.0.1` lands in the next default
build without touching the others. The output filename carries the highest
version actually included. With no `--version`, the highest major present wins.

A chapter folder may hold several versions side by side; nothing outside the
`NN - <title> <LANG> - vX.Y.Z.md` pattern is picked up (unparseable names are
reported, not silently skipped).

`build.php` implements its own small Markdown subset converter — headings,
paragraphs (hard-wrapped lines are joined), fenced blocks, blockquotes, ordered
and unordered lists, and inline `` `code` ``/`**bold**`/`*italic*`. If you
introduce new Markdown constructs in the manuscript, teach the converter about
them or they will render as plain paragraphs.

## Chapter architecture

Chapters are not independent essays; they form a dependency chain from
elementary dynamics up to phenomenal interpretation. Reading order matters.

| # | Chapter | Mechanism / role |
|---|---------|------------------|
| 01 | Introduction to DPSH | Frames the central claim: `S(t+dt) = F(S(t), I(t))` instead of `X -> F(X) -> Y` |
| 02 | Formal model | Autonomous stateful neuron, spike-as-event, no global clock |
| 03 | Spontaneous stochastic activity | Noise as state-space exploration |
| 04 | Endogenous oscillators | Time/phase as internal structure, not a clock |
| 05 | Non-commutative dynamics | Order of inputs is information |
| 06 | Self-organization, symmetry breaking | Local rules → global macrostate |
| 07 | Metastable Perceptual Manifold | Operational definition of a perceptual state; the theory's pivot chapter |
| 08 | Hysteresis and continuity | Persistence of the inner world |
| 09 | Predictive limitation of dynamics | Prediction as constraint, not controller |
| 10 | Deep State Learning | Learning the dynamical geometry, not input→output |
| 11 | Global Workspace | Percept formation vs. global availability (separable) |
| 12 | Perceptual Manifold | Shared internal model, many observables of one state |
| 13 | Phenomenal state and qualia | The deliberately unresolved hard-problem chapter |
| 14 | Integrated predictions | Hypothesis hierarchy, dependency DAG, ablation program |
| 15 | Cognia engine requirements | Event-driven engine spec, the implementation handoff |

Chapter 07 is the structural centre of the theory (it says so itself in `7.48`):
it is where `percept = functionally relevant metastable population dynamics` is
actually defined, and chapters 08–14 build on that definition. Two parts of it
are cited from elsewhere and should be treated as shared vocabulary rather than
local prose:

- **`7.29` — the eight-criterion operational definition** of a perceptual state
  (decodability, persistence, robustness, metastability, history dependence,
  causal relevance, sensory grounding, generalization).
- **`7.30`–`7.35` — the measurement vocabulary**: separability, dwell time,
  transition matrix, transition entropy, trajectory reproducibility,
  perturbation stability. Later chapters and the chapter 15 engine requirements
  assume these metrics; use these names rather than inventing synonyms.

## Three separate numbering spaces

These were deliberately de-collided. Keep them apart:

- **`H1`–`H13`** — the theory's hypotheses. Reserved exclusively for these.
- **`E1`–`E3`** — the three epistemic levels of claim strength (mechanistic /
  perceptual / phenomenal), introduced in `1.12` and expanded in `13.61`.
- **Experiment IDs** — a chapter-scoped letter prefix, never a bare `H<n>`.

## The hypothesis registry (H1–H13)

The theory's spine. Layered in `14.2`, wired into a dependency DAG in `14.3`.
Each hypothesis is declared exactly once, in the closing
`Výzkumná hypotéza kapitoly` section of its own chapter, as a blockquoted
bolded `H<n> – <English Name>` block. `14.2` carries the canonical names and
must agree with those declarations.

- **Layer A — elementary dynamics:** H1 Globally Clockless Dynamics (ch02),
  H2 Functional Stochasticity (ch03), H3 Endogenous Temporal Organization
  (ch04), H4 Non-Commutative Neural Dynamics (ch05)
- **Layer B — emergence of internal macrostate:** H5 Self-Organized Symmetry
  Breaking (ch06), H6 Metastable Perceptual Manifold (ch07), H7 Perceptual
  Continuity and Hysteresis (ch08), H8 Predictively Constrained Dynamics (ch09)
- **Layer C — learning and system integration:** H9 Deep State Learning (ch10),
  H10 Global Accessibility (ch11), H11 Shared Perceptual Manifold (ch12)
- **Layer D — phenomenal interpretation:** H12 Phenomenal Dynamic Substrate
  (ch13)
- **Outside the hierarchy:** H13 Experimental Realizability (ch15) — a
  precondition for testing layers A–D, not a layer above D.

Chapters 01 and 14 declare no hypothesis; that is correct for their roles
(introduction and integration). If you add or renumber a hypothesis, update
`14.2`, the ASCII DAG in `14.3`, and every chapter that cites it.

## Experiment ID namespaces

One letter per chapter, numbered contiguously from 1:

- `S1–S5` — chapter 03 (stochasticity)
- `O1–O7` — chapter 04 (oscillators)
- `N1–N6` — chapter 05 (non-commutativity)
- `M1–M10` — chapter 07 (metastable manifold)
- `HY1–HY11` — chapter 08 (hysteresis; `HY`, not `H`, to keep `H<n>` free)
- `P1–P11` — chapter 09 (prediction)
- `D1–D20` — chapter 10 (Deep State Learning)
- `Q1–Q8` — chapter 13 (qualia)

Chapters 06, 11, 12 propose no numbered experiments.

## Writing conventions

Match these exactly; the manuscript's uniformity is deliberate and was
normalized across all 15 chapters.

- **Language:** Czech prose. Technical terms stay in English, uninflected, and
  are *not* translated (`spike`, `refractory period`, `metastable`,
  `symmetry breaking`, `predictive processing`, `Deep State Learning`,
  `workspace`, `ignition`, `observables`, `STDP`).
- **`Perceptual Manifold`** is a proper noun: always two words, both
  capitalized, never translated to `perceptuální manifold`. Lowercase
  `manifold` is the separate Czech-inflected common noun (`deformace
  manifold`, `hierarchie manifoldů`, `lokální manifoldy`) and stays lowercase.
- **Line width:** hard-wrapped at ~72–76 columns, never past 78. Headings are
  the only lines allowed to run long. Never emit unwrapped paragraphs.
- **Paragraphs:** short — often a single sentence, separated by a blank line.
- **Headings:** every chapter is `# N. Title` followed by flat `## N.M Title`.
  Section numbers are sequential from 1 with no gaps and are not capped
  (chapter 15 reaches `15.156`). `###` is used only for unnumbered groupings
  inside a section.
- **Blank lines:** two before every `## `, one before every `### `, exactly one
  after any heading, one before the first `## ` of a chapter. Files end with a
  single newline.
- **Block literals:** all formulas and pseudo-diagrams use bare
  triple-backtick fences with no language tag. Relative indentation inside a
  block is meaningful (ASCII diagrams) — preserve it. There are no
  4-space-indented code blocks anywhere in the manuscript.
- **Inline symbols** use backticks: `S(t)`, `σ = 0`, `H2`.
- **Arrows** in block literals go on their own indented line:
  `input` / `    ->` / `output`.
- **Bullet lists** use `-`, never `*`.
- **Spelling:** `hystereze` / `hysterezi` / `hysterezní` (short `e`, never
  `hysteréze`); `nekomutativita` (never `nekumutativita`).
- **Hypotheses, strong claims, and falsification statements** are blockquotes,
  usually with the claim bolded inside the quote.
- **Chapter ending:** mechanism chapters close with `## N.M Falsifikační
  kritéria` followed by `## N.M+1 Výzkumná hypotéza kapitoly`.
- **Epistemic discipline is a hard rule of this manuscript:** claims about
  phenomenal experience are always explicitly marked as unproven. Chapter 13
  (`13.62`, `13.63`) and `14.67`–`14.69` deliberately keep a `?` between the
  functional dynamic state and subjective experience. Do not tighten that
  hedging into an assertion, and do not let a mechanism chapter claim it
  explains qualia.

## Layout and file naming

One folder per chapter, zero-padded: `01/` … `15/`. Inside it, sources are
named `NN - <English title, sentence case> <LANG> - vX.Y.Z.md`, where `NN`
matches the folder. Proper nouns keep their capitals (`Perceptual Manifold`,
`Global Workspace`, `DPSH`, `Cognia`). The `LANG` marker (`CZ` today) is what
`--lang` selects, so translations live beside the Czech source in the same
folder.

`dist/` is generated output and git-ignored — never edit anything there.

## Consistency checks

When editing, these are the things that actually break:

1. A chapter's closing hypothesis number must match its layer assignment and
   canonical name in `14.2`, and its position in the `14.3` DAG.
2. Cross-chapter mechanism references (each chapter relates its mechanism to
   stochasticity, oscillation, non-commutativity, symmetry breaking,
   metastability, hysteresis, and the Perceptual Manifold) must stay mutually
   consistent — the same mechanism is described from ~8 angles.
3. Falsification criteria in a mechanism chapter must correspond to the failure
   signatures in `14.15`, the ten global predictions in `14.16`–`14.25`, and the
   experimental phases 0–10 in `14.26`–`14.38`.
4. Chapter 15 requirements must be traceable to a hypothesis; per `14.70`, the
   theory is frozen and new architectural elements are only supposed to be
   added in response to an experimental problem or a falsified claim — not
   because they resemble biology.
