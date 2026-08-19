# 11. Global Workspace a globální dostupnost perceptu

## 11.1 Vznik perceptu není totéž jako globální dostupnost

Dynamic Perceptual State Hypothesis rozlišuje dvě odlišné otázky:

1. jak vzniká koherentní perceptuální stav,
2. jak se tento stav stává dostupným širšímu systému.

Předchozí kapitoly se zabývaly převážně první otázkou.

Pracovní řetězec DPSH je:

```
sensory dynamics
    ->
metastable perceptual state
    ->
workspace access
    ->
global availability.
```

Global Workspace tedy není v DPSH nutně mechanismem, který percept
vytváří.

Může být mechanismem, který vybraný již existující dynamický stav
zpřístupňuje dalším funkčním subsystémům.


## 11.2 Percept může existovat bez globálního broadcastu

Předpokládejme lokální nebo distribuovaný stav:

```
M_A.
```

Tento stav může být:

```
decodable,
persistent,
behaviorally relevant,
```

aniž byl zpřístupněn všem ostatním modulům.

Může například ovlivnit:

```
local action selection
```

ale nemusí být dostupný:

```
language,
explicit report,
deliberate reasoning.
```

To vytváří důležité rozlišení:

```
perceptual processing
```

versus:

```
globally accessible processing.
```


## 11.3 Global Workspace jako funkční rozhraní

Pracovně definujeme Global Workspace jako mechanismus, který umožní,
aby vybraný stav ovlivnil více jinak specializovaných subsystémů.

Například:

```
perceptual state M_A
        |
        v
    workspace
        |
+-------+--------+--------+---------+
|       |        |        |         |
v       v        v        v         v
```

memory  action   value   language   planning.

Workspace tedy nemusí obsahovat úplnou kopii celého Perceptual Manifold.

Může zpřístupnit určitou jeho projekci nebo aktuálně relevantní
makrostav.


## 11.4 Specializované subsystémy

DPSH předpokládá existenci specializovaných funkčních modulů.

Například:

```
visual processing,
auditory processing,
memory,
valuation,
motor control,
language,
planning,
attention.
```

Každý z nich může mít vlastní lokální dynamiku.

Global Workspace poskytuje mechanismus, kterým mohou některé výsledky
těchto lokálních dynamik získat širší vliv.


## 11.5 Lokální dostupnost

Ne každý stav musí být globální.

Může existovat hierarchie dostupnosti:

```
local state
    ->
regional availability
    ->
workspace candidate
    ->
global broadcast.
```

Tím se vyhneme představě, že každý neuronální stav je automaticky
součástí vědomého zpracování.


## 11.6 Kandidát na workspace

Perceptuální stav může získat vyšší pravděpodobnost workspace access,
pokud vykazuje například:

```
high relevance,
novelty,
unresolved prediction error,
strong persistence,
behavioral importance,
competition victory,
attentional amplification.
```

Formálně:

```
P(access | M_i)
    =
F(
    relevance,
    novelty,
    prediction_error,
    stability,
    attention,
    context
).
```


## 11.7 Workspace selection nemusí být centrální selector

Stejně jako u perceptuálního výběru nechceme zavést funkci:

```
workspace.select(M_A).
```

To by pouze přesunulo problém na další centrální mechanismus.

Přístup může vzniknout z konkurence mezi kandidátními stavy:

```
M_A
M_B
M_C.
```

Každý má určitou schopnost aktivovat distribuovanou workspace síť.

Jedna reprezentace může překročit dynamický threshold a spustit
globální šíření.


## 11.8 Ignition

Pracovní mechanismus může mít podobu:

```
local activation
    ->
recurrent amplification
    ->
threshold crossing
    ->
distributed ignition
    ->
global accessibility.
```

Ignition tedy může být dynamickým přechodem, nikoli explicitní
programovou událostí.


## 11.9 Ignition jako fázový přechod

Jednou z možností je chápat workspace ignition analogicky jako
makroskopický fázový přechod.

Pod určitým parametrem:

```
λ < λ_c
```

zůstává aktivita lokální.

Nad:

```
λ > λ_c
```

vznikne kvalitativně jiný režim:

```
distributed coherent activation.
```

To by odpovídalo:

```
local processing
    ->
global regime.
```

DPSH tuto možnost považuje za testovatelnou, nikoli za hotový závěr.


## 11.10 Percept formation před ignition

Jedna z hlavních odlišností DPSH je hypotéza:

```
perceptual state formation
    precedes
workspace ignition.
```

Tedy:

```
M_A
```

může již obsahovat koherentní perceptuální strukturu ještě před tím, než
se stane globálně dostupným.

Workspace pak řeší:

```
accessibility,
```

nikoli nutně:

```
construction.
```


## 11.11 Silnější alternativa

Je však nutné připustit i alternativu:

> Některé percepty mohou vzniknout až prostřednictvím široké
> rekurentní interakce zahrnující samotný workspace.

Proto musí experimenty rozlišit:

```
local percept formation
```

od:

```
workspace-dependent percept formation.
```

DPSH nesmí předem předpokládat výsledek.


## 11.12 Workspace jako broadcast dynamického stavu

Pokud percept není statická hodnota, workspace by neměl nutně broadcastovat:

```
label = "chair".
```

Může zpřístupňovat dynamickou strukturu:

```
M_chair(t)
```

nebo její komprimovanou projekci.

To znamená, že globálně dostupný obsah může obsahovat:

```
identity,
current state,
temporal context,
predictions,
affordances,
relevance.
```


## 11.13 Broadcast není kopírování všech neuronů

Global availability neznamená, že každý modul dostane přesnou kopii:

```
S(t).
```

Spíše:

```
projection_i(M_A)
    ->
module_i.
```

Například motorický systém může využít:

```
graspability.
```

Jazykový modul:

```
name.
```

Paměťový systém:

```
similarity to previous experience.
```

Všechny však mohou být ovlivněny stejným základním perceptuálním stavem.


## 11.14 Workspace a observables

Pro každý modul `i` lze definovat:

```
O_i = G_i(M_A).
```

Workspace tedy zpřístupňuje různé observables stejného dynamického
objektu.

To je kompatibilní s představou Perceptual Manifold jako společné
interní reality dostupné různým mechanismům různými projekcemi.


## 11.15 Global availability a integrace

Pokud jeden stav ovlivňuje současně:

```
memory,
action,
language,
value,
```

vzniká funkční integrace.

Stejný percept je použit napříč více subsystémy.

To může být jeden z hlavních významů globální dostupnosti.


## 11.16 Workspace a jednotnost chování

Bez globálního přístupu mohou různé moduly reagovat na odlišné lokální
informace.

Workspace může umožnit koordinaci:

```
current percept
    ->
consistent action,
consistent report,
consistent planning.
```

Globální dostupnost tak může přispívat k jednotnému chování organismu.


## 11.17 Workspace a pozornost

Attention může měnit pravděpodobnost:

```
workspace access.
```

Například:

```
attention(M_A)
    ->
amplification(M_A)
    ->
increased P(ignition).
```

Pozornost však nemusí být totožná s workspace.

Může fungovat jako modulátor selekce.


## 11.18 Workspace a prediction error

Silný nevyřešený prediction error může být jedním z triggerů globálního
přístupu.

Například:

```
local model fails
    ->
prediction error persists
    ->
local state destabilizes
    ->
workspace ignition.
```

Tím lze vysvětlit, proč neočekávané události často získávají širší
zpracování.


## 11.19 Workspace a novelty

Podobně:

```
familiar predictable event
```

může být zpracován převážně lokálně.

Naopak:

```
novel event
```

může mít vysokou pravděpodobnost:

```
global access.
```

Systém tak nemusí globálně broadcastovat vše.


## 11.20 Workspace a relevance

Behaviorálně významný stav může být amplifikován i při nízké novelty.

Například:

```
threat,
reward,
goal relevance.
```

Proto:

```
workspace priority
```

není pouze funkcí prediction error.


## 11.21 Workspace a intuitivní rozhodování

Intuitivní rozhodnutí může vzniknout dříve, než je celý proces globálně
dostupný.

Například:

```
input
    ->
M_warning
    ->
action tendency.
```

Workspace může získat až výslednou projekci:

```
"something is wrong".
```

Nemusí získat celou historii, která vedla k:

```
M_warning.
```

To umožňuje rozlišit:

```
decision formation
```

od:

```
explicit reason representation.
```


## 11.22 Explicitní reasoning

Po workspace access může systém spustit další proces:

```
M_A
    ->
global reasoning
    ->
new internal states.
```

Reasoning může zpětně měnit:

```
attention,
prediction,
memory retrieval,
action selection.
```

Tím vzniká rekurentní smyčka mezi workspace a Perceptual Manifold.


## 11.23 Workspace není pouze výstupní buffer

Pokud workspace pouze přijme:

```
M_A
```

a rozešle ho dál, je to příliš pasivní model.

Global broadcast může zpětně změnit perceptuální dynamiku.

Například:

```
workspace content
    ->
attention shift
    ->
changed sensory gain
    ->
modified M.
```

Takový systém je uzavřená dynamická smyčka.


## 11.24 Rekurentní workspace

Proto může být vhodnější:

```
perceptual manifold
    <->
global workspace.
```

Workspace může:

```
read,
amplify,
modulate,
re-enter
```

interní dynamiku.

To je důležité pro dlouhodobé vědomé zpracování.


## 11.25 Workspace a pracovní paměť

Globálně dostupný stav může být udržován déle díky:

```
recurrent workspace activity.
```

To však nemusí být totéž jako původní perceptuální persistence.

Je důležité oddělit:

```
percept persistence
```

a:

```
workspace maintenance.
```


## 11.26 Percept bez workspace

DPSH předpokládá experimentální možnost:

```
local M_A exists
```

ale:

```
workspace disabled.
```

Pokud stav stále:

```
influences local behavior,
remains decodable,
persists,
```

pak máme evidence pro oddělení percept formation od global access.


## 11.27 Workspace bez stabilního perceptu

Opačný případ je také možný.

Globální systém může být aktivován:

```
noise,
error,
internal thought
```

bez stabilního externě ukotveného perceptu.

Proto:

```
workspace activity
```

sama o sobě nemusí být dostatečná pro perceptuální obsah.


## 11.28 Workspace ablation

Klíčový experiment:

```
perceptual network intact
workspace disabled.
```

Měříme:

```
local state separability,
local context use,
cross-module accessibility,
explicit report.
```

DPSH očekává možnost:

```
perceptual dynamics preserved
```

ale:

```
global accessibility reduced.
```


## 11.29 Cross-module test

Představme si percept:

```
M_A.
```

Visual subsystem stav dokáže vytvořit.

Motor system má reagovat podle něj.

Pokud není workspace:

```
visual -> motor
```

nemusí být možné, pokud moduly nemají přímé spojení.

S workspace:

```
visual M_A
    ->
workspace
    ->
motor.
```

Tím lze globální dostupnost přímo měřit.


## 11.30 Workspace jako omezený zdroj

Global Workspace Theory často pracuje s představou omezené kapacity.

DPSH může tuto vlastnost testovat pomocí konkurence:

```
M_A
M_B
M_C.
```

Pokud workspace nemůže současně globálně stabilizovat všechny, vznikne:

```
access competition.
```


## 11.31 Workspace competition

Kandidátní stavy mohou soutěžit:

```
strength,
relevance,
novelty,
attention.
```

Výsledek:

```
one or few states
    ->
global broadcast.
```

To může být další symmetry-breaking proces na vyšší úrovni.


## 11.32 Dvě úrovně symmetry breaking

Můžeme tedy rozlišit:

### Perceptual symmetry breaking

```
competing local interpretations
    ->
M_A.
```

### Workspace symmetry breaking

```
competing perceptual states
    ->
global access(M_A).
```

Tyto procesy nemusí být identické.


## 11.33 Workspace jako další dynamický manifold

Samotný workspace může mít vlastní stavový prostor:

```
W(t).
```

Globální dynamika potom není:

```
M -> output,
```

ale:

```
M(t)
    <->
W(t).
```

Systém může mít dvě vzájemně interagující dynamické struktury:

```
perceptual manifold P
workspace manifold W.
```


## 11.34 Vazba P a W

Formálně:

```
dP/dt = F(P, W, I)
```

a:

```
dW/dt = G(W, P, goals, memory).
```

Taková architektura umožňuje:

```
bottom-up access
```

a:

```
top-down modulation.
```


## 11.35 Ignition threshold

Pro workspace můžeme definovat makroskopickou veličinu:

```
G(t)
```

například míru globální rekurentní aktivace.

Ignition nastane při:

```
G(t) > θ_G.
```

Důležité je testovat, zda existuje skutečný nelineární přechod, nebo jen
plynulé zvýšení dostupnosti.


## 11.36 Ignition a stochasticita

Pokud je kandidátní stav těsně pod threshold:

```
G ≈ θ_G,
```

malá stochastic fluctuation může způsobit:

```
ignition.
```

To může vést k trial-to-trial variabilitě při identickém near-threshold
stimulu.


## 11.37 Ignition a fáze

Podobně může workspace access záviset na časové konfiguraci.

Stejný perceptuální input:

```
M_A
```

může získat globální přístup v určité fázi:

```
φ_good
```

a selhat při:

```
φ_bad.
```

Tím lze testovat propojení lokální časové organizace s globálním
broadcastem.


## 11.38 Ignition a historie

Pokud workspace samotný má stav:

```
W(t),
```

pak jeho reakce na:

```
M_A
```

závisí na:

```
W_previous.
```

Globální přístup tedy může vykazovat:

```
hysteresis,
refractory effects,
history dependence.
```


## 11.39 Explicitní report

Report lze chápat jako downstream funkci:

```
workspace content
    ->
language/report module.
```

Pokud:

```
report = A,
```

neznamená to automaticky, že report vytváří percept.

Je pouze jedním z observables globálně dostupného stavu.


## 11.40 Report-free measurement

Pro výzkum je důležité používat i metriky nezávislé na explicitním
reportu.

Například:

```
forced-choice action,
prediction,
state decoding,
perturbation response.
```

Tím lze oddělit perceptuální dynamiku od samotného report mechanismu.


## 11.41 Workspace a fenomenální hypotéza

Jedna možnost je:

```
phenomenal experience
    depends on
global access.
```

Jiná:

```
phenomenal experience
    depends on
perceptual state before access.
```

DPSH tuto otázku v této fázi nerozhoduje.

Právě oddělení:

```
percept formation
```

a:

```
global availability
```

umožňuje tyto alternativy později testovat.


## 11.42 Možné modely vztahu perceptu a vědomí

### Model A

```
percept
    ->
workspace
    ->
consciousness.
```

### Model B

```
percept = phenomenal state
```

a workspace pouze poskytuje:

```
access/report.
```

### Model C

```
recurrent interaction
    between percept and workspace
```

je nutná pro fenomenální zkušenost.

DPSH musí zůstat kompatibilní s testováním všech tří možností.


## 11.43 Experiment GW1 – local percept without workspace

Vytvoříme úlohu:

```
A -> blank -> ambiguous X.
```

Síť vytvoří:

```
M_A.
```

Workspace je následně vypnut.

Testujeme:

```
state persistence,
local decision,
explicit report,
cross-module transfer.
```

Pokud lokální funkce zůstanou, ale globální přístup zmizí, podporuje to
separaci obou mechanismů.


## 11.44 Experiment GW2 – workspace ablation after percept formation

Necháme nejprve vzniknout:

```
M_A.
```

Teprve potom provedeme:

```
workspace ablation.
```

Sledujeme, zda:

```
M_A persists
```

a zda se změní pouze:

```
global accessibility.
```


## 11.45 Experiment GW3 – workspace ablation before percept formation

Naopak vypneme workspace před stimulačním vstupem.

Pokud:

```
M_A
```

nevznikne vůbec, může to znamenat, že workspace je pro percept formation
nutný.

Tím získáme přímý test vztahu.


## 11.46 Experiment GW4 – cross-module accessibility

Percept vznikne pouze ve visual subsystem.

Poté testujeme, zda informaci může použít:

```
motor,
memory,
language.
```

Porovnáme:

```
workspace ON
```

versus:

```
workspace OFF.
```


## 11.47 Experiment GW5 – ignition threshold

Postupně měníme strength stimulu:

```
λ.
```

Měříme:

```
local percept strength
```

a:

```
global workspace activity.
```

Hledáme, zda workspace vykazuje:

```
smooth response
```

nebo:

```
nonlinear threshold / ignition.
```


## 11.48 Experiment GW6 – competition

Současně vytvoříme:

```
M_A
M_B.
```

Oba soutěží o workspace.

Měníme:

```
relevance,
sensory strength,
attention.
```

Sledujeme:

```
which state gains access.
```


## 11.49 Experiment GW7 – novelty

Porovnáme:

```
familiar predictable stimulus
```

a:

```
novel stimulus.
```

Měříme:

```
workspace access probability,
prediction error,
local percept formation.
```

Hypotéza předpokládá, že novelty může ovlivnit access i při podobné
perceptuální síle.


## 11.50 Experiment GW8 – unresolved prediction error

Síť dostane vstup, který lokální perceptual model neumí dobře vysvětlit.

Měříme:

```
persistent prediction error
    ->
workspace activation.
```

Tím testujeme hypotézu, že workspace řeší zejména lokálně nevyřešené
situace.


## 11.51 Experiment GW9 – intuitive action before report

Síť se naučí komplexní klasifikační situaci.

Po novém vstupu měříme čas:

```
t_action
```

a:

```
t_workspace/report.
```

Pokud:

```
t_action < t_report,
```

může rozhodnutí vzniknout před explicitní globální dostupností.


## 11.52 Experiment GW10 – top-down feedback

Po workspace ignition změníme top-down signál:

```
attention to feature X.
```

Měříme změnu:

```
local perceptual dynamics.
```

Pokud workspace skutečně tvoří rekurentní smyčku, musí globální stav
zpětně ovlivnit Perceptual Manifold.


## 11.53 Experiment GW11 – workspace phase dependence

Při stejném lokálním perceptu měníme:

```
phase relationship
```

mezi perceptuální sítí a workspace.

Měříme:

```
ignition probability,
transmission efficacy,
global availability.
```

To propojuje Global Workspace s oscilační částí DPSH.


## 11.54 Experiment GW12 – capacity limit

Prezentujeme několik současně relevantních perceptů:

```
M_1 ... M_n.
```

Postupně zvyšujeme:

```
n.
```

Měříme:

```
number globally accessible,
interference,
switching.
```

Tím lze testovat omezenou kapacitu workspace.


## 11.55 Metrika global accessibility

Definujeme:

```
A_global(M)
```

jako počet nebo rozsah funkčně odlišných modulů, jejichž chování lze
kauzálně ovlivnit stavem `M`.

Nízká hodnota:

```
local state.
```

Vysoká:

```
globally accessible state.
```


## 11.56 Metrika ignition

Můžeme měřit:

```
G_peak,
propagation range,
recurrence duration,
number of activated modules.
```

Důležité bude odlišit skutečný nelineární ignition od prostého zvýšení
celkové aktivity.


## 11.57 Metrika workspace selectivity

Pro kandidáty:

```
M_A,
M_B
```

definujeme:

```
P(access_A),
P(access_B).
```

Manipulace relevance nebo attention by měla systematicky měnit jejich
pravděpodobnost.


## 11.58 Falsifikační kritéria

Navrhované rozdělení DPSH a Global Workspace bude oslabeno, pokud:

1. žádný perceptuální stav nevzniká bez aktivního workspace,
2. workspace ablation vždy zničí i lokální perceptuální reprezentaci,
3. globální dostupnost nelze experimentálně oddělit od existence
   perceptuálního stavu,
4. nedochází k měřitelnému cross-module broadcastu,
5. workspace neprojevuje žádnou konkurenci nebo selektivitu,
6. předpokládané ignition je plně vysvětlitelné lineárním zvýšením
   aktivity,
7. top-down workspace feedback nemá žádný vliv na perceptuální dynamiku,
8. globální dostupnost nepřináší žádnou funkční schopnost nad rámec
   lokálního zpracování.

V takovém případě bude nutné vztah DPSH a Global Workspace zásadně
přeformulovat.


## 11.59 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H10:

> **H10 – Global Accessibility Hypothesis**
>
> Metastabilní perceptuální stav a jeho globální dostupnost jsou
> funkčně odlišné procesy. Perceptuální dynamika může vzniknout v
> distribuované rekurentní síti před globálním přístupem, zatímco Global
> Workspace umožňuje, aby vybraný dynamický stav získal kauzální vliv
> na široké spektrum jinak specializovaných subsystémů. Přístup do
> workspace může vzniknout nelineárním rekurentním ignition procesem
> modulovaným relevancí, pozorností, predikční chybou a stavem systému.

Silnější falsifikovatelná predikce:

> Pokud percept formation a global accessibility skutečně představují
> oddělitelné mechanismy, musí existovat experimentální podmínka, ve
> které lze zachovat dekodovatelný a kauzálně relevantní lokální
> perceptuální stav při současném snížení jeho dostupnosti vzdáleným
> modulům, explicitnímu reportu nebo širšímu rozhodovacímu systému.

DPSH tím navrhuje:

```
percept formation
    !=
global accessibility.
```

A zároveň připouští, že:

```
phenomenal consciousness
```

může záviset na jednom z těchto mechanismů nebo na jejich rekurentní
interakci.

Tuto otázku nelze rozhodnout pouze funkcí Global Workspace a bude
předmětem fenomenální části hypotézy.
