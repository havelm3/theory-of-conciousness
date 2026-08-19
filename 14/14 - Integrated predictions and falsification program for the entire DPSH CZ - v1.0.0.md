# 14. Integrované predikce a falsifikační program celé DPSH

## 14.1 Účel integrační kapitoly

Předchozí kapitoly formulovaly jednotlivé mechanismy Dynamic Perceptual
State Hypothesis odděleně.

To bylo nutné proto, aby bylo možné každý mechanismus samostatně
experimentálně testovat.

Celá DPSH však netvrdí, že vědomý nebo hluboký percept vzniká pouze z:

```
stochasticity
```

nebo:

```
oscillations
```

nebo:

```
metastability.
```

Centrální tvrzení je integrační.

DPSH předpokládá, že relevantní perceptuální dynamika vzniká z
interakce více mechanismů:

```
globally unclocked dynamics
    +
spontaneous stochastic activity
    +
endogenous temporal organization
    +
non-commutative event ordering
    +
recurrent self-organization
    +
symmetry breaking
    +
metastability
    +
hysteresis
    +
predictive constraints
    +
local plasticity
    +
shared perceptual manifold
    +
global accessibility.
```

Proto je nutné testovat nejen:

```
does mechanism X work?
```

ale také:

```
does mechanism X causally contribute to the integrated system?
```


## 14.2 Hierarchie hypotéz

Jednotlivé dílčí hypotézy DPSH nemají stejnou epistemickou sílu.

Lze je rozdělit do čtyř vrstev. Uvedené názvy jsou závazné a odpovídají
deklaracím v sekcích `Výzkumná hypotéza kapitoly` jednotlivých kapitol.

### Vrstva A – základní dynamické mechanismy

Sem patří:

```
H1 Globally Clockless Dynamics Hypothesis
H2 Functional Stochasticity Hypothesis
H3 Endogenous Temporal Organization Hypothesis
H4 Non-Commutative Neural Dynamics Hypothesis.
```

Tyto hypotézy popisují vlastnosti elementární dynamiky systému.

### Vrstva B – vznik interního makrostavu

Sem patří:

```
H5 Self-Organized Symmetry Breaking Hypothesis
H6 Metastable Perceptual Manifold Hypothesis
H7 Perceptual Continuity and Hysteresis Hypothesis
H8 Predictively Constrained Dynamics Hypothesis.
```

Tyto hypotézy popisují vznik a udržování funkčního interního stavu.

### Vrstva C – učení a systémová integrace

Sem patří:

```
H9 Deep State Learning Hypothesis
H10 Global Accessibility Hypothesis
H11 Shared Perceptual Manifold Hypothesis.
```

Tyto hypotézy popisují, jak se dynamika učí, sdílí a zpřístupňuje.

### Vrstva D – fenomenální interpretace

Sem patří:

```
H12 Phenomenal Dynamic Substrate Hypothesis.
```

Tato vrstva není přímo ověřitelná pouze pomocí Cognia.

Je závislá na výsledcích předchozích vrstev a na biologických datech.

### Mimo hierarchii – technická podmínka testovatelnosti

Kapitola 15 formuluje ještě jednu dílčí hypotézu:

```
H13 Experimental Realizability Hypothesis.
```

H13 není nadstavbou vrstvy D. Je předpokladem, bez kterého nelze
vrstvy A–D vůbec experimentálně testovat.

Tyto epistemické vrstvy `A`–`D` je nutné odlišovat od tří úrovní
tvrzení `E1`–`E3` zavedených v sekci 1.12, které popisují, jak silné
tvrzení o výsledku lze vůbec vznést.


## 14.3 Závislosti mezi hypotézami

Některé hypotézy lze testovat nezávisle.

Jiné mají smysl pouze tehdy, pokud byly alespoň částečně podpořeny
předchozí vrstvy.

Pracovní závislost:

```
 H1
  |
  v
 H2 ----+
  |     |
  v     v
 H3 --> H4
   \    /
    \  /
     v
    H5
     |
     v
    H6
   /  \
  v    v
 H7    H8
   \   /
    \ /
     v
    H9
   /  \
  v    v
H10   H11
   \   /
    \ /
     v
    H12.
```

Tento diagram není tvrzením, že všechny mechanismy jsou nutné.

Je experimentální roadmapou.


## 14.4 Minimální jádro DPSH

Nejmenší soubor mechanismů, který má smysl testovat jako základ
dynamického perceptu, je:

```
autonomous stateful units
    +
recurrence
    +
spontaneous stochasticity
    +
temporal organization
    +
history dependence.
```

Z tohoto jádra musí být možné vytvořit:

```
persistent internal macrostate.
```

Pokud to není možné, vyšší vrstvy teorie nemají dostatečný základ.


## 14.5 První integrační predikce

DPSH předpovídá, že systém obsahující všechny základní mechanismy bude
vykazovat kvalitativně odlišnou state-space dynamiku než odpovídající
zjednodušené kontrolní sítě.

Porovnání:

```
full DPSH core
```

versus:

```
synchronous rate-based control.
```

Měřit:

```
state dimensionality,
metastability,
transition entropy,
history dependence,
perturbation response,
temporal coding,
contextual persistence.
```

Silná predikce:

```
dynamics_full
    !=
dynamics_control
```

i při podobné:

```
task accuracy.
```


## 14.6 Accuracy není hlavní kriterium

Důležité metodologické pravidlo celé DPSH:

> Vyšší classification accuracy sama o sobě nepotvrzuje hypotézu.

DPSH je teorií interní dynamiky.

Systém může mít:

```
same task accuracy
```

ale zásadně rozdílnou:

```
internal organization.
```

Proto musí být vždy měřeny také:

```
trajectory structure,
state persistence,
temporal dependency,
causal state influence.
```


## 14.7 Ablation program

Každý mechanismus musí být možné samostatně odstranit.

Základní full model:

```
async
+ stochastic
+ oscillatory
+ recurrent
+ STDP
+ predictive
+ continuous state.
```

Pak vytváříme:

```
- stochasticity
- oscillations
- recurrence
- STDP
- prediction
- history
- workspace
```

a měříme změnu systému.

To poskytuje kauzální mapu mechanismů.


## 14.8 Factorial design

Jednoduché ON/OFF experimenty nemusí stačit.

Některé mechanismy mohou fungovat pouze ve vzájemné interakci.

Například:

```
stochasticity x oscillations
oscillations x STDP
phase x delays
recurrence x inhibition
prediction x hysteresis.
```

Proto je vhodné používat faktoriální design.

Například:

```
stochasticity:
    ON / OFF

phase structure:
    intact / scrambled

plasticity:
    ON / OFF.
```

Vznikne:

```
2 x 2 x 2
```

experimentálních podmínek.

Lze tak měřit interakční efekt.


## 14.9 Synergie mechanismů

DPSH předpokládá možnost, že:

```
effect(A + B)
    >
effect(A)
    +
effect(B).
```

Například:

```
stochasticity alone
    ->
variability.

oscillation alone
    ->
temporal regularity.
```

Ale:

```
stochasticity + oscillation
    ->
structured exploration.
```

Takový synergický efekt je pro integrační hypotézu důležitější než
samostatná účinnost komponent.


## 14.10 Redundance mechanismů

Opačně může experiment ukázat:

```
A is not necessary
```

protože:

```
B can substitute A.
```

Například explicitní oscillator cells nemusí být nutné, pokud rekurentní
síť vytváří emergentní oscilaci.

V takovém případě musí být hypotéza zobecněna.

Ne:

```
oscillator cell is required
```

ale:

```
temporal organization is required.
```


## 14.11 Nutnost versus dostatečnost

Každý mechanismus musí být posuzován ve dvou směrech.

### Nutnost

Pokud odstraníme:

```
X,
```

zmizí relevantní vlastnost?

### Dostatečnost

Pokud máme pouze:

```
X,
```

vznikne relevantní vlastnost?

Například:

```
oscillations
```

mohou být:

```
useful but not sufficient.
```

DPSH nesmí zaměňovat tyto dvě otázky.


## 14.12 Kauzální hierarchie

Pro jednotlivý mechanismus lze definovat:

```
mechanism
    ->
intermediate effect
    ->
macrostate change
    ->
behavioral consequence.
```

Například:

```
phase relation
    ->
transmission efficacy
    ->
state transition
    ->
perceptual choice.
```

Experiment musí ideálně měřit všechny mezikroky.

Jinak hrozí nesprávná atribuce kauzality.


## 14.13 Primární integrační hypotéza

Centrální mechanistickou hypotézu celé DPSH lze formulovat:

> V globálně netaktované rekurentní síti může interakce spontánní
> stochasticity, lokální časové organizace, history-dependent
> nelineární dynamiky, rekurentní selekce a lokální plasticity vytvářet
> metastabilní distribuované makrostavy, jejichž geometrie zachovává
> perceptuální kontext, generuje predikce a kauzálně ovlivňuje další
> zpracování.

Toto je hlavní testovatelná teze.


## 14.14 Silná integrační predikce

Pokud má DPSH pravdu, musí platit:

```
remove temporal organization
    ->
degrade macrostate structure
```

i pokud zachováme přibližně:

```
firing rate,
spike count,
network size,
sensory information.
```

Stejně:

```
remove recurrence
    ->
degrade persistence.
```

A:

```
remove history
    ->
degrade context dependence.
```

Tedy různé mechanismy musí mít specifické signatury selhání.


## 14.15 Failure signatures

Každý mechanismus by měl mít očekávaný typ poruchy.

### Bez stochasticity

Očekáváme možné:

```
rigidity,
poor exploration,
reduced spontaneous transitions.
```

### Bez phase organization

Očekáváme:

```
poorer temporal coordination,
weaker dynamic routing,
degraded timing-sensitive learning.
```

### Bez recurrence

Očekáváme:

```
poor persistence,
reduced metastability.
```

### Bez history

Očekáváme:

```
loss of hysteresis,
reduced context dependence.
```

### Bez prediction

Očekáváme:

```
excessive drift
nebo
poor adaptation to changed environment.
```

### Bez plasticity

Očekáváme:

```
fixed manifold geometry.
```

Takové signatury jsou důležité pro falsifikaci.


## 14.16 Globální predikce č. 1 – mikroskopická variabilita, makroskopická stabilita

DPSH předpovídá:

```
spike patterns vary
```

zatímco:

```
macrostate identity persists.
```

Tedy:

```
high microstate variability
    +
low macrostate variability.
```

Pokud stabilní percept vyžaduje téměř identické spike patterns, tato
část hypotézy bude oslabena.


## 14.17 Globální predikce č. 2 – timing matters beyond rate

Silná predikce:

```
same approximate rate
same spike count
same topology
```

ale:

```
different temporal organization
```

vede k:

```
different internal dynamics.
```

Pokud ne, časová část DPSH ztrácí význam.


## 14.18 Globální predikce č. 3 – historie mění současnost

Pro:

```
same current input X
```

po:

```
history A
```

a:

```
history B
```

musí existovat:

```
S_A(X) != S_B(X)
```

alespoň v některých relevantních úlohách.

To je základní podmínka kontinuálního interního modelu.


## 14.19 Globální predikce č. 4 – perception survives brief input loss

Po vytvoření:

```
M_A
```

krátký:

```
sensory dropout
```

nesmí okamžitě zničit celý perceptuální stav.

Musí existovat měřitelná persistence.


## 14.20 Globální predikce č. 5 – internal state affects ambiguous input

Po:

```
M_A
```

a:

```
M_B
```

musí stejný:

```
X_ambiguous
```

vést k rozdílným pravděpodobnostem výsledku.

Tím se prokáže funkční význam interního stavu.


## 14.21 Globální predikce č. 6 – learned environment changes spontaneous dynamics

Po učení:

```
spontaneous_before
    !=
spontaneous_after.
```

Silnější predikce:

```
spontaneous_after
```

bude strukturálně podobnější naučeným evoked states.


## 14.22 Globální predikce č. 7 – prediction stabilizes reality-consistent states

Stav s nízkým prediction error:

```
M_correct
```

má mít vyšší persistence než:

```
M_inconsistent
```

za jinak srovnatelných podmínek.


## 14.23 Globální predikce č. 8 – excessive prediction produces pathological persistence

Při příliš silném:

```
top-down gain
```

očekáváme:

```
reduced sensory correction,
excessive state persistence.
```

Toto je systémová predikce rovnováhy mezi interním modelem a realitou.


## 14.24 Globální predikce č. 9 – percept formation and global access are separable

Musí existovat alespoň některé podmínky:

```
local percept present
global access reduced.
```

Pokud nelze oba procesy oddělit, H10 bude nutné přeformulovat.


## 14.25 Globální predikce č. 10 – shared state supports multiple functions

Stejný interní makrostav by měl být použitelný pro:

```
prediction,
action,
valuation,
report.
```

Pokud každý modul potřebuje zcela nezávislou reprezentaci, H11 je
oslabena.


## 14.26 Experimentální fáze 0 – validace enginu

Než začneme testovat DPSH, musí být ověřeno, že Cognia správně
implementuje základní fyziku modelu.

Testovat:

```
event ordering,
delays,
stochastic distribution,
oscillator phase,
refractory periods,
plasticity timing,
state logging.
```

Pokud engine není deterministicky reprodukovatelný při fixed random
seed, nebude možné interpretovat výsledky.


## 14.27 Reprodukovatelnost

Každý experiment musí podporovat:

```
random seed,
network snapshot,
exact configuration,
event log.
```

Experiment:

```
run(configuration, seed)
```

musí být opakovatelný.


## 14.28 Frozen randomness control

Pro stochastic experimenty je nutné porovnávat:

```
same network
same input
same stochastic sequence
```

proti:

```
same network
fresh stochastic sequence.
```

Tím lze oddělit:

```
stochastic distribution effect
```

od:

```
exploration effect.
```


## 14.29 Experimentální fáze 1 – autonomní dynamika

První cílem není perception.

Je:

> Dokáže síť bez externího vstupu vytvářet ne-triviální dynamiku?

Testovat:

```
deterministic silence,
spontaneous activity,
oscillatory regimes,
metastability.
```

Pokud ne, další vrstvy zatím nemají smysl.


## 14.30 Experimentální fáze 2 – emergence metastability

Síť dostane jednoduché konkurenční podmínky:

```
A
B.
```

Testujeme:

```
symmetry breaking,
state persistence,
spontaneous switching.
```

Měříme:

```
order parameter,
dwell time,
transition entropy.
```


## 14.31 Experimentální fáze 3 – temporal causality

Testujeme:

```
A -> B
```

versus:

```
B -> A.
```

A:

```
phase intact
```

versus:

```
phase scrambled.
```

To ověří, zda timing skutečně tvoří důležitou state variable.


## 14.32 Experimentální fáze 4 – perceptual context

Použijeme:

```
A -> blank -> X_ambiguous
```

a:

```
B -> blank -> X_ambiguous.
```

Toto je první skutečný test Deep Percept.

Podmínkou úspěchu je:

```
internal state during blank
    ->
predicts later choice.
```


## 14.33 Experimentální fáze 5 – causal perturbation

Nestačí stav dekódovat.

Musíme jej aktivně změnit.

Například:

```
M_A -> perturb -> M_B.
```

Potom:

```
same X
```

musí vést k jinému výsledku.

To je zásadní evidence kauzality.


## 14.34 Experimentální fáze 6 – predictive world model

Síť dostane časově strukturované prostředí.

Testujeme:

```
next-state prediction,
occlusion,
unexpected continuation,
correction after mismatch.
```

Tady se z paměťového state stává model prostředí.


## 14.35 Experimentální fáze 7 – Deep State Learning

Teprve po vytvoření stabilního manifold zapneme:

```
ongoing plasticity during spontaneous activity.
```

Testujeme:

```
consolidation,
generalization,
drift,
self-reinforcement.
```

To je riziková část hypotézy a musí být testována opatrně.


## 14.36 Experimentální fáze 8 – multimodální manifold

Přidáme více vstupních modalit.

Například:

```
visual-like input
audio-like input.
```

Testujeme:

```
cross-modal completion,
shared state,
context integration.
```


## 14.37 Experimentální fáze 9 – Global Workspace

Až poté přidáme:

```
workspace.
```

Testujeme:

```
global broadcast,
competition,
ignition,
top-down feedback.
```

Workspace nesmí maskovat selhání nižší perceptuální vrstvy.


## 14.38 Experimentální fáze 10 – fenomenální analogie

Cognia nemůže přímo testovat:

```
qualia.
```

Může však testovat:

```
Deep Percept properties.
```

Biologická literatura musí následně ověřovat, zda stejné dynamické
mechanismy korelují a kauzálně souvisejí s reportovaným vědomým
perceptem.


## 14.39 Stop conditions

Důležitou součástí programu jsou podmínky, kdy se výzkum nemá pouze
posunout dál.

Například:

### Stop A

Pokud phase scrambling nemá žádný efekt při rate-matched control,
nepoužívat phase jako centrální mechanismus v dalších experimentech.

### Stop B

Pokud persistentní state neexistuje bez explicitní memory cell,
revidovat H6.

### Stop C

Pokud history reset nemění chování,
revidovat H7.

### Stop D

Pokud predictive feedback nemění adaptaci,
revidovat H8.

Takový postup brání tomu, aby se teorie stala nefalsifikovatelnou.


## 14.40 Kritéria úspěchu první generace Cognia DPSH

Za první významný úspěch bychom nepovažovali:

```
"system behaves intelligently."
```

Minimální experimentální balík by měl ukázat současně:

1. autonomní ongoing activity,
2. metastabilní population states,
3. persistence přes sensory blank,
4. history-dependent interpretation,
5. phase/timing causal effect beyond rate,
6. causal effect of state perturbation,
7. predictive continuation,
8. learning-induced state-space deformation.

To by představovalo silnou podporu Deep Percept mechanismu.


## 14.41 Kritéria silnějšího úspěchu

Silnější systém by navíc měl ukázat:

9. spontaneous replay,
10. useful ongoing plasticity,
11. multimodal integration,
12. shared downstream projections,
13. dynamic routing,
14. global access competition,
15. workspace feedback.

Takový systém by byl velmi zajímavou implementací celé funkční vrstvy
DPSH.


## 14.42 Negativní výsledky jsou součástí teorie

Pokud mechanismus selže, není to neúspěch výzkumu.

Například:

```
oscillator cells not needed
```

může vést k lepší teorii:

```
emergent temporal structure is sufficient.
```

Nebo:

```
stochasticity not necessary
```

může znamenat, že relevantní explorace vzniká jiným mechanismem.

DPSH musí být ochotna vlastní komponenty odstranit.


## 14.43 Model reduction

Po každém experimentálním cyklu je vhodné hledat nejjednodušší model,
který stále reprodukuje relevantní jevy.

Tedy:

```
full model
    ->
remove unnecessary mechanism
    ->
simpler explanatory core.
```

Cílem není maximalizovat počet zajímavých mechanismů.

Cílem je nalézt minimální kauzální architekturu.


## 14.44 Competing models

Pro každý důležitý experiment musí existovat alespoň jeden jednodušší
alternativní model.

Například:

### DPSH model

```
dynamic metastable state.
```

### Alternative A

```
explicit memory register.
```

### Alternative B

```
conventional RNN hidden state.
```

### Alternative C

```
rate-coded attractor.
```

Pokud všechny vysvětlí data stejně dobře, DPSH nemá dostatečnou
explanatory advantage.


## 14.45 Model comparison

Porovnávat nejen:

```
task accuracy.
```

Také:

```
complexity,
robustness,
generalization,
state richness,
perturbation behavior,
temporal sensitivity.
```

Silnější model musí vysvětlovat více relevantních jevů.


## 14.46 Falsifikace silné verze DPSH

Silná mechanistická verze DPSH bude vážně oslabena, pokud se ukáže, že:

1. synchronous control vytváří stejné relevantní dynamické vlastnosti,
2. stochasticita nepřináší žádný specifický efekt,
3. timing a phase lze odstranit bez ztráty funkce,
4. pořadí událostí je irelevantní,
5. metastabilita není potřebná,
6. history dependence nepřináší žádný efekt,
7. simple explicit memory vysvětluje všechny perceptuální výsledky,
8. prediction není potřeba pro reality grounding,
9. shared manifold nelze funkčně prokázat,
10. workspace není oddělitelný od základního perceptu.

V takovém případě by bylo nutné původní teorii zásadně redukovat.


## 14.47 Falsifikace fenomenální verze

Fenomenální H12 bude oslabena, pokud biologické experimenty ukáží, že:

```
conscious percept
```

systematicky přetrvává bez dynamických mechanismů, které DPSH považuje
za kandidátní substrát.

Zvlášť důležité by byly disociace:

```
same phenomenal state
    +
radically different relevant macrostate
```

nebo:

```
same macrostate
    +
systematically different phenomenal state.
```

Takové výsledky by oslabily strukturální korespondenci.


## 14.48 Co by DPSH nepovažovala za potvrzení

Za potvrzení nelze považovat pouze:

```
high classification accuracy,
human-like text output,
self-report of consciousness,
complex behavior,
large neural network,
presence of oscillations,
presence of metastability.
```

Každá z těchto vlastností může existovat bez centrálního mechanismu
DPSH.


## 14.49 Nejdůležitější potvrzující výsledek

Za mimořádně silný výsledek bychom považovali situaci:

```
same network
same sensory input
same approximate firing rate
same spike count
same connectivity
```

ale:

```
different relative timing / phase organization
```

vede k:

```
different metastable perceptual state
```

a tato změna:

```
causally changes later interpretation.
```

To by poskytlo velmi přímou podporu tvrzení, že časová organizace není
vedlejší detail, ale součást interní reprezentace.


## 14.50 Druhý nejsilnější výsledek

Další silný výsledek:

```
sensory input removed
```

ale:

```
internal context persists,
```

a:

```
perturbing that internal state
```

změní reakci na pozdější:

```
identical ambiguous input.
```

Tím bychom prokázali funkční existenci interního dynamického stavu nad
rámec aktuálního sensory stream.


## 14.51 Třetí nejsilnější výsledek

Třetí:

```
learning
    ->
spontaneous dynamics changes
```

a spontaneous learning:

```
improves held-out generalization.
```

To by poskytlo podporu silné Deep State Learning hypotéze.


## 14.52 Integrated Deep Percept criterion

Pro potřeby výzkumu definujeme souhrnné kritérium.

Systém má **Deep Percept**, pokud interní stav současně splňuje:

```
D1 decodability
D2 persistence
D3 metastability
D4 history dependence
D5 temporal sensitivity
D6 predictive relevance
D7 causal downstream influence
D8 robustness
D9 generalization
D10 distributed integration.
```

Není nutné, aby každé kritérium bylo binární.

Lze vytvořit vektor:

```
DP =
    (
        d1,
        d2,
        ...,
        d10
    ).
```

To umožní porovnávat různé architektury bez jediného arbitrárního
"consciousness score".


## 14.53 Deep Percept Index

Pro praktické experimenty lze později vytvořit kompozitní metriku:

```
DPI = F(d1, d2, ..., d10).
```

Je však důležité, aby:

```
DPI
```

nebyl interpretován jako:

```
degree of consciousness.
```

Je pouze technickou metrikou funkčních vlastností Deep Percept.


## 14.54 Výzkumný registr

Každý experiment by měl být evidován ve formátu:

```
hypothesis
prediction
architecture
control
manipulated variable
dependent metrics
result
falsification status
interpretation.
```

Tím lze zabránit zpětnému přizpůsobování hypotézy výsledkům.


## 14.55 Pre-registration princip

U klíčových experimentů je vhodné ještě před spuštěním explicitně
zapsat:

```
expected outcome,
null outcome,
falsifying outcome.
```

Například:

```
phase scramble
    ->
predicted decrease in state separability.
```

Pokud výsledek nenastane, musí být zaznamenán jako negativní.


## 14.56 Experimentální verze DPSH

Teorie by měla mít verze:

```
DPSH 0.1
DPSH 0.2
...
```

Každá verze zaznamená:

```
retained hypotheses,
rejected hypotheses,
modified mechanisms.
```

Cognia implementace musí být verzována současně s teorií.


## 14.57 Vztah teorie a Cognia enginu

Vývoj engine nesmí předbíhat hypotézu tak, že mechanismus bude přidán
jen proto, že zlepší výkon.

Každá významná vlastnost engine musí mít vazbu:

```
theoretical assumption
    ->
implementation
    ->
experimental prediction.
```

Například:

```
H3 temporal organization
    ->
local oscillator API
    ->
phase scramble experiment.
```


## 14.58 Cognia jako experimentální aparatura

Cognia zde není pouze výsledná AI.

Je především:

```
experimental platform.
```

Musí umožnit:

```
mechanism isolation,
precise perturbation,
logging,
replay,
ablation,
state-space analysis.
```

To je důležitější než okamžitá schopnost řešit složité úlohy.


## 14.59 Priorita malých sítí

První experimenty by měly používat co nejmenší sítě, ve kterých je jev
pozorovatelný.

Výhody:

```
interpretable dynamics,
cheaper parameter sweeps,
easier causal analysis,
fewer confounds.
```

Velká síť má smysl až tehdy, když mechanismus funguje v malém.


## 14.60 Scaling experiments až později

Teprve po prokázání základních mechanismů je vhodné měnit:

```
N neurons,
connectivity density,
oscillator count,
delay distribution.
```

Pak lze testovat:

```
scaling laws.
```

Například:

```
state richness vs N
robustness vs redundancy
connectivity vs timing structure.
```


## 14.61 Hlavní výzkumná roadmapa

Celý program lze zjednodušit:

### Stage 1

```
Can autonomous dynamics exist?
```

### Stage 2

```
Can it self-organize metastable states?
```

### Stage 3

```
Does timing causally matter?
```

### Stage 4

```
Can a state retain perceptual context?
```

### Stage 5

```
Does that state causally alter future interpretation?
```

### Stage 6

```
Can it predict the environment?
```

### Stage 7

```
Can experience reshape the state space?
```

### Stage 8

```
Can spontaneous dynamics consolidate it?
```

### Stage 9

```
Can multiple functions share the state?
```

### Stage 10

```
Can selected content become globally available?
```

### Stage 11

```
Do corresponding biological dynamics track phenomenal perception?
```


## 14.62 Minimum publishable experiment

První publikace nemusí ověřovat celou DPSH.

Naopak by měla testovat jednu centrální kauzální tezi.

Nejsilnější kandidát:

> **Relativní časová organizace stochastic spiking activity kauzálně
> přispívá k tvorbě a udržování metastabilního perceptuálního stavu nad
> rámec samotného firing rate.**

Experiment:

```
A -> blank -> ambiguous X
```

v:

```
phase-intact
```

a:

```
rate-matched phase-scrambled
```

síti.

Měřit:

```
state separability,
persistence,
causal behavioral effect.
```


## 14.63 Druhá publikace

Pokud první hypotéza uspěje:

> **Spontánní ongoing activity a local plasticity mění geometrii
> naučeného state space a mohou zlepšit budoucí perceptual prediction.**

Tady by se testoval:

```
Deep State Learning.
```


## 14.64 Třetí publikace

Další:

> **Metastabilní perceptuální state může fungovat jako shared internal
> model pro více downstream subsystémů před vstupem do Global
> Workspace.**

Tím by se testoval Perceptual Manifold.


## 14.65 Fenomenální publikace až později

Teprve po podpoře mechanistické části má smysl publikovat širší
teoretický argument:

```
Deep Percept
    ->
candidate phenomenal substrate.
```

Bez funkčního mechanismu by byla fenomenální část příliš spekulativní.


## 14.66 Centrální falsifikační otázka celé DPSH

Celou mechanistickou teorii lze shrnout otázkou:

> **Obsahuje relativní časově organizovaná trajektorie distribuované
> autonomní neuronální sítě kauzální informaci o jejím interním
> perceptuálním stavu, kterou nelze redukovat na aktuální senzorický
> vstup, firing rates ani explicitní paměťovou proměnnou?**

Pokud:

```
no,
```

pak velká část DPSH ztrácí důvod existence.

Pokud:

```
yes,
```

následuje otázka:

> **Může být tato dynamická struktura průběžně učena, prediktivně
> ukotvena ve světě a sdílena mezi funkčními subsystémy?**


## 14.67 Konečná struktura tvrzení

DPSH proto postupuje od nejslabšího k nejsilnějšímu tvrzení:

### Tvrzení A

```
dynamic states exist.
```

### Tvrzení B

```
dynamic states carry information.
```

### Tvrzení C

```
dynamic states causally affect future processing.
```

### Tvrzení D

```
dynamic states form integrated perceptual context.
```

### Tvrzení E

```
experience reshapes their geometry.
```

### Tvrzení F

```
they function as shared internal world model.
```

### Tvrzení G

```
selected content becomes globally available.
```

### Tvrzení H

```
these mechanisms may constitute a candidate substrate of
phenomenal experience.
```

Každý krok musí být podpořen samostatně.


## 14.68 Hlavní metodologický princip

DPSH musí být navržena tak, aby mohla selhat.

Pokud každý negativní experiment vysvětlíme přidáním nové pomocné
hypotézy, přestane být teorie vědecky užitečná.

Proto platí:

> Mechanismus, který opakovaně nepřináší predikovaný kauzální efekt,
> musí být z centrální teorie odstraněn nebo degradován na nepovinnou
> implementační vlastnost.


## 14.69 Integrovaná hypotéza celé DPSH

Finální pracovní formulace mechanistické části zní:

> **Dynamic Perceptual State Hypothesis předpokládá, že kontinuální
> interní percept může vznikat jako metastabilní makroskopická
> trajektorie globálně netaktované rekurentní sítě autonomních
> stochastických jednotek. Relativní timing, endogenní oscilatorická
> organizace, synaptická zpoždění, nekomutativní historie, rekurentní
> selekce a lokální plasticita společně formují stavový prostor, jehož
> dynamika uchovává senzorický kontext, generuje predikce a ovlivňuje
> budoucí interpretaci. Senzorická evidence průběžně omezuje tento
> interní model a vybrané stavy mohou následně získat globální
> dostupnost prostřednictvím workspace mechanismu.**

Fenomenální rozšíření zůstává:

> **Pokud subjektivní fenomenální obsah supervenuje na neuronální
> dynamice, takto integrovaný časově rozvinutý dynamický stav představuje
> kandidátní substrát fenomenální zkušenosti.**

První tvrzení musí být experimentálně falsifikováno nebo podpořeno.

Druhé zůstává otevřenou teoretickou hypotézou.


## 14.70 Bezprostřední další krok

Po formulaci celé DPSH už další krok není přidávání dalších teoretických
mechanismů.

Je jím:

```
freeze theory version 0.1
```

a převést jednotlivé hypotézy do:

```
Cognia engine requirements
    ->
minimal experimental architectures
    ->
predefined metrics
    ->
ablation experiments.
```

Od tohoto okamžiku musí nové architektonické prvky vznikat primárně jako
odpověď na:

```
experimentální problém
```

nebo:

```
falsifikovanou část hypotézy,
```

nikoli pouze proto, že intuitivně připomínají biologický mozek.
