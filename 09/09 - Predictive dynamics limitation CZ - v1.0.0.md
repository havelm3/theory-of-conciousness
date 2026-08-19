# 9. Prediktivní omezení dynamiky

## 9.1 Problém volné vnitřní dynamiky

Předchozí kapitoly předpokládají systém, který je:

```
globálně netaktovaný,
rekurentní,
stochastický,
oscilatoricky organizovaný,
history-dependent,
metastabilní.
```

Takový systém může vytvářet bohatou interní dynamiku.

To však samo o sobě nestačí.

Pokud by vnitřní stav mohl evolvovat zcela nezávisle na vnějším světě,
mohl by systém vytvářet:

```
self-consistent
```

ale:

```
externally incorrect
```

reprezentace.

Dynamic Perceptual State Hypothesis proto potřebuje mechanismus, který
udržuje interní dynamiku v dostatečné shodě se senzorickou realitou.

Tímto mechanismem je prediktivní omezení.


## 9.2 Interní stav jako generativní model

Perceptuální stav není chápán pouze jako reakce na aktuální vstup.

Může zároveň generovat očekávání budoucího senzorického vývoje.

Formálně:

```
P(t + dt) = G(S(t))
```

kde:

- `S(t)` je současný interní stav,
- `G` je prediktivní mechanismus,
- `P(t + dt)` je očekávaný budoucí senzorický stav.

Systém tedy nevytváří pouze:

```
representation of now,
```

ale také:

```
expectation of next.
```


## 9.3 Senzorická evidence

V dalším okamžiku přichází skutečný senzorický vstup:

```
I(t + dt).
```

Ten lze porovnat s predikcí:

```
P(t + dt).
```

Vzniká odchylka:

```
ε(t + dt)
    =
I(t + dt) - P(t + dt).
```

Tato odchylka nepředstavuje nutně jeden centrální globální skalár.

Může být distribuovaná mezi mnoho lokálních subsystémů:

```
ε_visual,
ε_audio,
ε_motion,
ε_position,
...
```

Každý z nich může lokálně měnit dynamiku sítě.


## 9.4 Predikce není centrální rozhodovač

DPSH nepředpokládá mechanismus:

```
global_error
    ->
choose_correct_percept.
```

Takový model by pouze znovu zaváděl centrální selektor.

Místo toho má predikční chyba působit lokálně.

Například:

```
local mismatch
    ->
altered excitability
    ->
altered spike probability
    ->
destabilized local pattern
    ->
changed recurrent dynamics.
```

Globální změna perceptu potom vznikne jako makroskopický důsledek
mnoha lokálních korekcí.


## 9.5 Predikce jako constraint

Základní role predictive processing v DPSH není:

```
construct percept.
```

Je:

```
constrain perceptual dynamics.
```

Tedy:

```
possible internal states
    +
sensory evidence
    ->
allowed / disfavored trajectories.
```

Predikce mění pravděpodobnost, že systém zůstane v určité metastabilní
oblasti.

Pro stav `M_A` můžeme zapsat:

```
stability(M_A)
    =
F(
    internal dynamics,
    sensory consistency,
    prediction error
).
```


## 9.6 Stabilizace kompatibilního stavu

Pokud:

```
prediction(M_A)
    ≈
sensory evidence,
```

pak:

```
ε_A ≈ 0.
```

V takovém případě může být:

```
persistence(M_A) high.
```

Systém tedy nemusí při každém novém vstupu vytvářet nový percept.

Současný stav může pokračovat, pokud je nadále kompatibilní s realitou.


## 9.7 Destabilizace nekompatibilního stavu

Pokud:

```
prediction(M_A)
    !=
sensory evidence,
```

pak:

```
ε_A grows.
```

To může snižovat:

```
stability(M_A).
```

Pokud odchylka přetrvává nebo je dostatečně velká:

```
M_A
    ->
transition region
    ->
M_B.
```

Predikční chyba tedy může být jedním z mechanismů, které umožňují
opuštění starého perceptu.


## 9.8 Persistence versus korekce

DPSH potřebuje rovnováhu mezi dvěma tendencemi.

### Persistence

```
previous state
    ->
continuity.
```

### Correction

```
sensory mismatch
    ->
state revision.
```

Příliš silná persistence:

```
internal model ignores reality.
```

Příliš silná korekce:

```
internal model collapses with every small fluctuation.
```

Funkční systém musí existovat mezi těmito extrémy.


## 9.9 Prediction error jako tlak, ne instrukce

Je užitečné chápat prediction error nikoli jako instrukci:

```
"switch to state B".
```

Spíše jako tlak:

```
"state A is becoming less dynamically viable".
```

Systém sám prostřednictvím své vnitřní dynamiky hledá jinou
konfiguraci.

Tedy:

```
prediction error
    ->
destabilization
    ->
increased state-space exploration
    ->
new state selection.
```

To dobře zapadá do kombinace se stochasticitou.


## 9.10 Stochasticita a prediktivní omezení

Spontánní stochasticita může generovat alternativní trajektorie:

```
M_A
    ->
candidate state M_B
    ->
candidate state M_C.
```

Predikční mechanismus může měnit jejich relativní stabilitu.

Například:

```
ε_A = high
ε_B = low
ε_C = medium.
```

Pak může vzniknout:

```
P(M_A persists) low
P(M_B persists) high
P(M_C persists) medium.
```

Senzorická realita tedy neříká systému přímo, který stav má vytvořit.

Mění pravděpodobnost přežití dostupných stavů.


## 9.11 Selekce mezi interními hypotézami

Perceptuální dynamiku lze chápat jako průběžnou soutěž mezi
alternativními interními hypotézami:

```
H_A
H_B
H_C.
```

Každá odpovídá určité oblasti manifold:

```
M_A
M_B
M_C.
```

Senzorická evidence průběžně mění jejich dynamickou podporu.

To vede k:

```
hypothesis competition
    ->
metastable selection.
```


## 9.12 Predictive processing a symmetry breaking

Pokud dvě interpretace mají podobnou podporu:

```
M_A ~ M_B,
```

pak malý rozdíl v prediction error může vytvořit bias:

```
ε_A < ε_B.
```

Tento rozdíl může být rekurencí zesílen:

```
small predictive advantage
    ->
larger state stability
    ->
recurrent reinforcement
    ->
symmetry breaking.
```

Predikce tak může ovlivnit výběr perceptu bez explicitního selectoru.


## 9.13 Predictive processing a hystereze

Předchozí percept může být stabilní i při mírném zvýšení prediction error.

To vytváří hysterezi:

```
M_A persists
```

dokud:

```
ε_A < threshold_A.
```

Po překročení určité hranice:

```
M_A -> M_B.
```

Při opačném směru může být návratový threshold jiný.

To poskytuje přirozené propojení mezi:

```
prediction,
persistence,
hysteresis.
```


## 9.14 Predikce a temporal depth

Interní model nemusí predikovat pouze další okamžik.

Může vytvářet očekávání na více časových škálách:

```
short-term prediction,
medium-term expectation,
long-term context.
```

Například:

```
immediate sensory continuation,
object trajectory,
expected event sequence.
```

DPSH proto připouští hierarchii temporálních predikcí.


## 9.15 Lokální prediktory

Predikce nemusí existovat v jednom centrálním modulu.

Můžeme mít:

```
predictor_visual,
predictor_motion,
predictor_audio,
predictor_body,
predictor_context.
```

Každý pracuje s lokálně dostupnou částí dynamického stavu.

Jejich interakce může společně omezovat globální Perceptual Manifold.


## 9.16 Predikce a oscilace

Prediktivní signál může měnit:

```
phase,
amplitude,
excitability,
synaptic gain.
```

Například očekávaný vstup může posunout lokální fázi tak, aby určitá
populace byla v okamžiku očekávaného signálu více excitabilní.

Tím vzniká mechanismus:

```
prediction
    ->
temporal preparation
    ->
selective sensory gain.
```


## 9.17 Predikce jako fázová příprava

Pokud systém očekává událost v čase:

```
t_expected,
```

může lokální oscilace nastavovat:

```
phase(t_expected) = receptive phase.
```

Příchozí očekávaný spike pak má větší účinek.

Neočekávaný vstup může dorazit v méně výhodné fázi a vytvořit větší
lokální narušení.

To spojuje predictive processing s časovou organizací.


## 9.18 Predikce a synaptická plasticita

Prediction error může modulovat plasticitu.

Například:

```
high error
    ->
increased plasticity
```

nebo naopak:

```
high confidence
    ->
reduced plasticity.
```

Obecně:

```
Δw_ij
    =
G(
    spike timing,
    local phase,
    prediction error,
    current state
).
```

Tím zkušenost, která systém překvapí, může měnit síť jinak než očekávaná
událost.


## 9.19 Učení modelu prostředí

Pokud se opakovaně objevuje sekvence:

```
A -> B -> C,
```

síť může změnit konektivitu tak, že:

```
A
```

zvýší pravděpodobnost predikce:

```
B,
```

a:

```
B
```

zvýší očekávání:

```
C.
```

Interní dynamika se tím stává generativním modelem časové struktury
prostředí.


## 9.20 Predictive manifold

Perceptual Manifold proto není pouze mapa současných perceptů.

Obsahuje také přechodovou strukturu:

```
P(M_j | M_i).
```

To lze interpretovat jako predikci.

Například:

```
M_person_walking
    ->
high probability(M_person_next_position).
```

Interní manifold tedy obsahuje implicitní model:

```
what tends to happen next.
```


## 9.21 Predikce jako geometrie přechodů

Prediction nemusí být reprezentována explicitním číslem.

Může být zakódována geometricky.

Pokud je přechod:

```
M_A -> M_B
```

dynamicky velmi snadný,

může to znamenat:

```
B is strongly expected after A.
```

Pokud je přechod velmi nepravděpodobný:

```
B is unexpected after A.
```

Tím se predikce může stát vlastností samotného stavového prostoru.


## 9.22 Predikce bez explicitního prediktoru

To vede k důležité možnosti.

Není nutné, aby síť obsahovala komponentu:

```
predict(B).
```

Samotná dynamika může způsobit:

```
S in M_A
    ->
trajectory naturally moves toward M_B.
```

Predikce je potom implicitně obsažena v dynamické geometrii.


## 9.23 Explicitní a implicitní predikce

DPSH proto rozlišuje:

### Explicitní predikce

Samostatný modul vytváří:

```
predicted signal.
```

### Implicitní predikce

Topologie a dynamika způsobují:

```
M_A -> likely M_B.
```

Oba mechanismy mohou v Cognia existovat.

Je důležité experimentálně zjistit, který je pro danou úlohu nutný.


## 9.24 Predikce a nekomutativita

Pokud:

```
A -> B
```

je očekávaná sekvence,

ale:

```
B -> A
```

není,

pak:

```
prediction_error(A -> B)
    !=
prediction_error(B -> A).
```

Prediktivní mechanismus je tedy přirozeně citlivý na pořadí.

To propojuje predictive processing s nekomutativní dynamikou.


## 9.25 Predikce a kauzalita

Systém se může učit nejen korelace, ale i směrové vztahy:

```
A precedes B.
```

To však samo o sobě ještě nedokazuje skutečnou kauzalitu.

DPSH proto používá pojem:

```
temporal predictive relation
```

opatrněji než:

```
causal model.
```

Kauzální reprezentace by vyžadovala samostatné experimenty s
intervencemi.


## 9.26 Predikce a překvapení

Neočekávaná událost může mít zvláštní funkční význam.

Pokud:

```
ε >> normal range,
```

může systém:

```
increase attention,
increase plasticity,
destabilize current percept,
trigger workspace access.
```

Tím se překvapení může stát mechanismem přechodu mezi lokálním
perceptuálním stavem a širším globálním zpracováním.


## 9.27 Predikce a Global Workspace

Jedna možná architektura:

```
predictable input
    ->
handled locally.
```

Naopak:

```
large unresolved prediction error
    ->
local instability
    ->
workspace access
    ->
global processing.
```

To by znamenalo, že Global Workspace není aktivován při každém perceptu.

Může být zvlášť důležitý tehdy, když lokální model nestačí.


## 9.28 Predikce a intuice

Intuitivní rozhodnutí může vzniknout, pokud naučený manifold rychle
přejde do stavu:

```
M_warning
```

na základě částečného vstupu.

Tento přechod může být výsledkem dlouhodobě naučené prediktivní geometrie.

Systém nemusí explicitně vědět:

```
"which exact features caused the warning".
```

Přesto může stav:

```
M_warning
```

správně predikovat:

```
unfavorable outcome.
```


## 9.29 Predikce a fenomenální stabilita

Pokud je subjektivní percept stabilní navzdory senzorickému šumu, může
být jedním z vysvětlení právě dominance interní predikce nad malými
okamžitými odchylkami.

To však nesmí být formulováno jako důkaz vztahu:

```
predictive processing -> qualia.
```

DPSH používá predictive mechanismus pouze jako kandidátní princip
stability funkčního perceptu.


## 9.30 Halucinace jako extrém interní dominance

Hypotetický patologický režim lze popsat:

```
internal prediction influence
    >>
sensory correction.
```

Pak:

```
self-generated state
    ->
self-confirming dynamics.
```

Takový stav může přetrvávat i při nedostatečné senzorické podpoře.

DPSH nepředkládá model klinických halucinací.

Tento extrém pouze ukazuje, proč musí být rovnováha mezi interním stavem
a externí evidencí experimentálně kontrolována.


## 9.31 Senzorický chaos jako opačný extrém

Na opačné straně:

```
sensory correction
    >>
internal persistence.
```

Pak každá malá změna vstupu zásadně přestavuje stav.

Systém může ztratit:

```
continuity,
object permanence,
robust interpretation.
```

Funkční percepce proto může vyžadovat mezilehlý režim.


## 9.32 Precision weighting

Ne všechny sensory errors musí mít stejný význam.

Systém může odhadovat důvěryhodnost vstupu:

```
precision.
```

Pak:

```
effective_error
    =
precision * prediction_error.
```

Například velmi noisy sensor může mít:

```
low precision.
```

Jeho odchylka nebude destabilizovat percept tolik jako přesný vstup.


## 9.33 Precision jako modulace dynamiky

Precision nemusí být explicitní pravděpodobnost.

Může být realizována například:

```
gain modulation,
excitability,
synaptic strength,
oscillatory coupling.
```

Tím se určité sensory channels stávají v daném kontextu významnější.


## 9.34 Attention jako precision control

Jedna z možných interpretací pozornosti je:

```
attention
    ->
increase precision of selected signals.
```

V DPSH by to znamenalo:

```
selected evidence
    ->
stronger influence on manifold dynamics.
```

Pozornost tak může měnit, které prediction errors mají největší vliv
na stabilitu perceptu.


## 9.35 Hierarchické predikce

Perceptuální systém může mít více úrovní.

Například:

```
edges
    ->
shapes
    ->
objects
    ->
scenes.
```

Každá úroveň může predikovat nižší.

Současně může dostávat prediction error směrem vzhůru.

DPSH není závislá na jedné konkrétní predictive hierarchy, ale musí být
kompatibilní s možností víceúrovňové dynamiky.


## 9.36 Predikce a Perceptual Manifold na více škálách

Můžeme mít lokální manifoldy:

```
P_visual,
P_audio,
P_body
```

a širší:

```
P_global.
```

Predikce mohou působit:

```
within level
```

i:

```
across levels.
```

Global percept může vzniknout jako koordinace více dynamických prostorů.


## 9.37 Experiment P1 – expected versus unexpected continuation

Síť naučíme sekvenci:

```
A -> B.
```

Poté testujeme:

```
A -> B
```

a:

```
A -> C.
```

Měříme:

```
internal perturbation,
prediction-error activity,
transition time,
state stability.
```

Očekáváme větší dynamické narušení pro:

```
A -> C.
```


## 9.38 Experiment P2 – prediction under occlusion

Síť sleduje pohybující se objekt:

```
x1 -> x2 -> x3.
```

Poté objekt na chvíli zmizí.

Síť musí interně predikovat:

```
x4,
x5.
```

Po návratu měříme rozdíl:

```
predicted position
    vs
actual position.
```

To testuje, zda Perceptual Manifold obsahuje dynamickou predikci, nikoli
pouze statickou paměť posledního vstupu.


## 9.39 Experiment P3 – contradictory evidence

Nejprve vytvoříme:

```
M_A.
```

Poté postupně zvyšujeme senzorickou evidenci pro:

```
B.
```

Měříme:

```
prediction error,
dwell time(M_A),
transition threshold,
transition trajectory.
```

To přímo propojuje prediction error s hysterezí.


## 9.40 Experiment P4 – prediction error ablation

Vytvoříme dvě stejné sítě.

### Network A

Prediction-error feedback aktivní.

### Network B

Prediction-error feedback odstraněn nebo výrazně omezen.

Testujeme:

```
percept stability,
adaptation,
hallucination-like persistence,
response to changed environment.
```

Pokud obě sítě fungují stejně, role prediktivního omezení bude
oslabena.


## 9.41 Experiment P5 – excessive prediction gain

Budeme zvyšovat sílu top-down prediction:

```
g_pred.
```

Měříme:

```
sensory correction,
persistence,
mismatch tolerance.
```

Očekáváme, že příliš vysoká hodnota může vést k:

```
excessive persistence.
```


## 9.42 Experiment P6 – excessive sensory gain

Naopak zvýšíme:

```
g_sensory.
```

Měříme:

```
state stability,
sensitivity to noise,
percept continuity.
```

Příliš vysoká hodnota může způsobit:

```
unstable frame-like perception.
```


## 9.43 Experiment P7 – optimal prediction/sensory balance

Prozkoumáme dvourozměrný prostor:

```
g_prediction
    x
g_sensory.
```

Hledáme oblast, kde systém současně dosahuje:

```
persistence,
adaptability,
prediction accuracy,
robustness.
```


## 9.44 Experiment P8 – precision modulation

Do senzoru přidáme noise.

Síť dostane informaci nebo musí odhadnout:

```
sensor reliability.
```

Testujeme, zda umí snížit vliv nespolehlivého error signálu.

Porovnáme:

```
precision-aware
```

a:

```
precision-unaware
```

systém.


## 9.45 Experiment P9 – implicit versus explicit prediction

Porovnáme:

### Model A

Explicitní predictor unit.

### Model B

Predikce pouze jako naučená transition geometry.

Oba systémy řeší stejnou časovou úlohu.

Měříme:

```
accuracy,
robustness,
generalization,
state-space structure.
```

Tím zjistíme, zda explicitní prediktor vůbec potřebujeme.


## 9.46 Experiment P10 – surprising event and workspace candidate

Síť běží ve stabilním:

```
M_A.
```

Vložíme neočekávanou událost:

```
X_surprise.
```

Měříme:

```
prediction error,
state destabilization,
activation of global-access mechanism.
```

Později lze testovat hypotézu:

```
unresolved surprise
    ->
increased probability of workspace ignition.
```


## 9.47 Experiment P11 – prediction changes phase structure

Testujeme, zda očekávání určitého vstupu mění před jeho příchodem:

```
oscillatory phase,
phase coherence,
local excitability.
```

Pokud ano, lze přímo propojit:

```
prediction
    ->
temporal preparation.
```


## 9.48 Metrika prediction error

Pro jednoduchý experiment:

```
E_pred =
    D(P(t), I(t)).
```

U komplexního manifold může být vhodnější měřit rozdíl mezi:

```
expected population state
```

a:

```
observed sensory-driven state.
```


## 9.49 Metrika predictive stability

Definujeme:

```
R_pred(M_A)
```

jako vztah mezi prediction error a pravděpodobností opuštění stavu:

```
R_pred =
    P(exit M_A | error ε).
```

Pokud prediktivní omezení funguje, měla by být tato funkce
systematická.


## 9.50 Metrika adaptability

Systém musí reagovat na skutečnou změnu prostředí.

Můžeme měřit:

```
T_adapt
```

od okamžiku permanentní změny vstupu do stabilizace nového stavu.

Příliš vysoká hodnota:

```
excessive rigidity.
```

Příliš nízká:

```
insufficient persistence.
```


## 9.51 Metrika model consistency

Pokud vnitřní stav skutečně reprezentuje strukturu prostředí, jeho
predikce by měly být statisticky lepší než baseline.

Tedy:

```
prediction_accuracy
    >
naive predictor.
```

Bez této vlastnosti by nebylo oprávněné mluvit o generativním interním
modelu.


## 9.52 Deep State Learning a predikce

Silnější hypotéza Deep State Learning předpokládá, že prediction error
může formovat nejen output, ale samotnou geometrii interního manifold.

Tedy:

```
repeated prediction error
    ->
plasticity
    ->
new state-space geometry
    ->
improved future prediction.
```

Síť se tím učí:

```
structure of possible worlds
```

nikoli pouze:

```
correct output labels.
```


## 9.53 Učení přechodových pravděpodobností

Pokud prostředí vykazuje:

```
A -> B 80 %
A -> C 20 %,
```

pak po učení očekáváme:

```
P(M_B | M_A)
    >
P(M_C | M_A).
```

Dynamika manifold by měla odrážet statistiku zkušenosti.


## 9.54 Spontánní aktivita a predictive replay

Po odstranění externího vstupu může spontánní aktivita navštěvovat
naučené trajektorie:

```
M_A -> M_B -> M_C.
```

Pokud při tom probíhá plasticita, systém může dále měnit svůj model.

Tady vzniká klíčová otázka:

```
consolidation
```

versus:

```
self-reinforcing error.
```

Tuto hranici bude nutné experimentálně měřit.


## 9.55 Predikce jako ochrana proti self-reinforcement

Pokud interní replay vytváří stav, který není později potvrzován
externí zkušeností, prediction error může zabránit jeho nekontrolovanému
zesilování.

To může být jeden z mechanismů, který odděluje:

```
useful internal learning
```

od:

```
self-generated drift.
```


## 9.56 Falsifikační kritéria

Prediktivní část DPSH bude oslabena, pokud:

1. interní stav negeneruje měřitelně lepší predikce budoucího vstupu než
   baseline,
2. prediction error nemění stabilitu metastabilních stavů,
3. odstranění prediction-error feedback nemění adaptaci k prostředí,
4. při okluzi systém pouze drží poslední hodnotu a negeneruje dynamickou
   predikci,
5. naučené transition probabilities neodpovídají statistice prostředí,
6. top-down predikce neposkytuje žádnou výhodu při noisy nebo
   ambivalentním vstupu,
7. predictive mechanismus lze odstranit bez změny relevantních
   perceptuálních vlastností,
8. všechny efekty lze vysvětlit jednoduchou feed-forward korekcí bez
   vztahu k internímu stavovému prostoru.

V takovém případě nebude predictive processing centrálním omezením
DPSH.


## 9.57 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H8:

> **H8 – Predictively Constrained Dynamics Hypothesis**
>
> Metastabilní perceptuální dynamika je průběžně omezována rozdílem mezi
> predikovanou a skutečnou senzorickou evidencí. Stavy kompatibilní s
> prostředím mají vyšší pravděpodobnost persistence, zatímco dlouhodobě
> nekompatibilní stavy jsou destabilizovány. Predikce tak neurčuje
> percept centrálně, ale mění dynamickou geometrii a pravděpodobnosti
> přechodů mezi interními stavy.

Silnější predikce zní:

> Pokud interní stav skutečně funguje jako generativní model, musí
> předpovídat budoucí senzorickou strukturu lépe než jednoduchá
> statistická baseline a systematická manipulace prediction-error
> feedback musí měnit stabilitu, adaptabilitu a přechodovou geometrii
> perceptuálních stavů.

Tato hypotéza netvrdí:

```
prediction = perception
```

ani:

```
prediction = consciousness.
```

Tvrdí:

```
autonomous internal dynamics
    +
sensory prediction
    +
distributed prediction error
    ->
reality-constrained perceptual manifold.
```

Tím vzniká klíčová vlastnost DPSH:

> Vnitřní svět nemusí být znovu rekonstruován z každého senzorického
> vstupu. Může kontinuálně existovat jako vlastní dynamický model,
> pokud je průběžně korigován skutečnou zkušeností.
