# 7. Metastabilní Perceptual Manifold

## 7.1 Od výběru stavu k jeho existenci

Předchozí kapitoly popsaly mechanismy, které mohou umožnit vznik
koherentního makrostavu:

- spontánní stochasticitu,
- časovou organizaci oscilacemi,
- nekomutativní dynamiku,
- rekurentní zesílení,
- spontánní narušení symetrie.

Nyní je nutné definovat, co přesně znamená, že síť vytvořila
**perceptuální stav**.

Dynamic Perceptual State Hypothesis nepředpokládá, že percept odpovídá:

```
jednomu neuronu,
```

ani:

```
jedné vrstvě,
```

ani:

```
jednomu statickému patternu aktivace.
```

Pracovní hypotéza je silnější:

> Percept odpovídá distribuovanému dynamickému makrostavu, který
> přetrvává po určitou dobu navzdory mikroskopickým změnám jednotlivých
> neuronálních aktivit a který ovlivňuje další evoluci systému.


## 7.2 Globální stav systému

Uvažujme síť `N` dynamických jednotek.

Její okamžitý globální stav lze zapsat:

```
S(t) =
    (
        s1(t),
        s2(t),
        ...,
        sN(t)
    ).
```

Každý lokální stav `si(t)` může obsahovat například:

```
membrane potential,
refractory state,
adaptation,
spike history,
local phase context,
modulatory state.
```

Pokud zahrneme také synaptickou a oscilační dynamiku, úplnější stav může
být:

```
S(t) =
    {
        neural states,
        synaptic states,
        oscillatory states,
        modulatory states
    }.
```

Tento globální stav není centrálně reprezentovanou datovou strukturou.

Je analytickým popisem celého fyzického systému.


## 7.3 Stavový prostor

Množina všech stavů, kterých může systém dosáhnout, tvoří stavový
prostor:

```
Ω.
```

Síť během své existence vytváří trajektorii:

```
S(t0)
    ->
S(t1)
    ->
S(t2)
    ->
...
    ->
S(tn).
```

V kontinuálním popisu:

```
S : t -> Ω.
```

Výzkumným objektem DPSH tedy není pouze:

```
output(t),
```

ale především:

```
trajectory through Ω.
```


## 7.4 Percept není bod

Jednoduchá reprezentace by mohla odpovídat bodu:

```
S_A.
```

Takový model je však příliš rigidní.

Stejný percept může být realizován mnoha mikroskopicky odlišnými
konfiguracemi:

```
S_A1,
S_A2,
S_A3,
...
```

Proto definujeme perceptuální oblast:

```
M_A ⊂ Ω.
```

Pokud:

```
S(t) in M_A,
```

říkáme, že systém se nachází v dynamickém stavu odpovídajícím perceptu
`A`.

Jednotlivé neurony se přitom mohou neustále měnit.


## 7.5 Makroskopická identita

Dva mikrostavy:

```
S1
S2
```

mohou být velmi rozdílné na úrovni jednotlivých spikeů.

Přesto mohou patřit do stejného makrostavu:

```
S1 in M_A
S2 in M_A.
```

Identita perceptu tedy nemusí vyžadovat:

```
identical spikes.
```

Vyžaduje zachování určitých makroskopických vztahů.

Například:

```
similar population geometry,
similar phase organization,
similar transition tendencies,
similar downstream effect,
similar predictive content.
```

To je jeden z klíčových principů DPSH:

> Perceptuální identita může být invariantní vůči části mikroskopické
> neuronální variability.


## 7.6 Co znamená metastabilita

Stav `M_A` není nutně permanentní attractor.

Je metastabilní.

To znamená:

```
S(t) in M_A
```

po dobu:

```
t0 < t < t1,
```

ale existuje nenulová pravděpodobnost:

```
P(M_A -> M_B) > 0.
```

Stav tedy současně splňuje dvě vlastnosti:

```
persistence
```

a:

```
transition capability.
```

To je důležité pro percepci.

Příliš nestabilní stav by nebyl schopen udržovat koherentní percept.

Příliš stabilní stav by nebyl schopen reagovat na změnu světa.


## 7.7 Metastabilita versus fixed-point attractor

Fixed-point attractor:

```
S(t) -> S*
```

a potom:

```
S(t + dt) ≈ S*.
```

Dynamický metastabilní stav může naopak vykazovat:

```
S1 -> S2 -> S3 -> S4 -> ...
```

přičemž:

```
all Si in M_A.
```

Percept tedy může být dynamický uvnitř své vlastní oblasti.

To je důležité.

DPSH nepředpokládá, že stabilita perceptu znamená zastavení dynamiky.


## 7.8 Metastabilní trajektorie

Některý percept nemusí odpovídat ani statické oblasti.

Může být charakterizován typickou trajektorií:

```
T_A.
```

Například:

```
S1 -> S2 -> S3 -> S4
```

může představovat jeden stabilní dynamický cyklus nebo sekvenci.

Jiná realizace stejného perceptu:

```
S1' -> S2' -> S3' -> S4'
```

může být odlišná na mikroskopické úrovni, ale geometricky podobná.

Proto lze percept popsat nejen jako:

```
region M_A
```

ale také jako:

```
family of trajectories T_A.
```


## 7.9 Dynamická invariance

DPSH předpokládá, že percept musí mít určitou míru invariance.

Například změna několika spikeů:

```
perturbation ε
```

nemá okamžitě vytvořit jiný percept.

Pokud:

```
S(t) + ε
```

zůstane v:

```
M_A,
```

pak je reprezentace robustní.

Tuto vlastnost lze měřit:

```
robustness(M_A).
```

Silnější perturbace může způsobit:

```
M_A -> M_B.
```

Tím získáváme experimentálně měřitelnou hranici perceptuální oblasti.


## 7.10 Basin of attraction

Pro perceptuální stav můžeme definovat basin:

```
B_A.
```

Je to množina počátečních stavů, které mají vysokou pravděpodobnost
přechodu do:

```
M_A.
```

Tedy:

```
S0 in B_A
    ->
P(S(t) -> M_A) high.
```

Učení může měnit:

```
size(B_A),
shape(B_A),
depth(B_A).
```

Známé percepty mohou mít větší nebo snadněji dostupné basiny než
neznámé konfigurace.


## 7.11 Dynamická geometrie

Perceptual Manifold není pevná geometrie.

Jeho struktura může být funkcí:

```
W(t),
phase(t),
sensory input,
internal context,
neuromodulation.
```

Tedy:

```
M = M(t).
```

Stejná síť může mít v různém kontextu jinou dynamickou geometrii.


## 7.12 Učení jako deformace manifold

Zkušenost:

```
E
```

způsobí plasticitu:

```
W -> W'.
```

Tím se změní dynamika:

```
F -> F'.
```

A tedy i stavový prostor:

```
M_before
    ->
M_after.
```

Učení lze proto chápat jako:

> deformaci geometrie dostupných interních stavů a pravděpodobností
> přechodů mezi nimi.

Tato interpretace je pro DPSH zásadní.

Síť se neučí pouze:

```
input -> output.
```

Učí se:

```
which internal states are easy to reach,
which states are stable,
how transitions occur.
```


## 7.13 Deep State Learning

Pracovní termín **Deep State Learning** označuje hypotézu, že plasticita
může měnit strukturu interního dynamického prostoru i mimo přímé
supervidované mapování vstupu na výstup.

Schematicky:

```
experience
    ->
state trajectory
    ->
local plasticity
    ->
altered transition geometry.
```

Silnější verze předpokládá:

```
spontaneous internal dynamics
    ->
plasticity
    ->
continued restructuring.
```

Tato část musí být experimentálně oddělena od běžného učení během
externí stimulace.


## 7.14 Perceptual Manifold

Definujeme pracovní objekt:

```
P = Perceptual Manifold.
```

`P` není jedna reprezentace.

Je strukturou:

```
P = {
    perceptual regions,
    trajectories,
    transition probabilities,
    phase relations,
    learned constraints,
    basin geometry
}.
```

Obsahuje tedy nejen:

```
"co systém právě vnímá",
```

ale také:

```
"do jakých stavů může přejít"
a
"jak snadné tyto přechody jsou".
```


## 7.15 Lokální percept a globální manifold

Jednotlivý percept:

```
M_A
```

je pouze část:

```
P.
```

Například:

```
M_face
M_table
M_hand
M_space
M_motion.
```

Tyto stavy nemusí existovat izolovaně.

Mohou být navzájem propojené.

Globální perceptuální zkušenost může být výsledkem jejich současné
dynamické konfigurace.


## 7.16 Integrovaný stav

DPSH předpokládá možnost, že percept není prostý součet:

```
M_A + M_B + M_C.
```

Interakce mohou vytvářet nový stav:

```
M_ABC
```

který není redukovatelný na nezávislé komponenty.

Tedy:

```
F(A, B)
    !=
F(A) + F(B).
```

To je další důsledek nelinearity a recurrence.


## 7.17 Binding bez centrálního binderu

Pokud jsou různé vlastnosti:

```
color,
shape,
position,
motion
```

dynamicky kompatibilní a vstupují do společné metastabilní konfigurace,
nemusí existovat samostatný modul:

```
bind_features().
```

Binding může být emergentní vlastností společného makrostavu.

DPSH však netvrdí, že oscilatorická synchronizace sama je univerzálním
mechanismem bindingu.

Předchozí rešerše ukázala, že jednoduché binding-by-synchrony tvrzení
má významné protiargumenty.

Proto pracujeme s obecnějším principem:

```
coordinated dynamics
    ->
integrated state.
```


## 7.18 Perceptuální stav jako kontext

Jakmile vznikne:

```
M_A,
```

stává se součástí vstupních podmínek pro další zpracování.

Nový stimulus `X` tedy není interpretován:

```
Y = F(X),
```

ale:

```
Y = F(X, M_A).
```

Pokud byl předchozí stav:

```
M_B,
```

může platit:

```
F(X, M_A)
    !=
F(X, M_B).
```

To poskytuje funkční definici interního perceptu:

> Stav je perceptuálně relevantní tehdy, pokud jeho existence mění
> interpretaci následného vstupu.


## 7.19 Persistence bez explicitní paměťové buňky

Perceptuální kontext může přetrvávat:

```
stimulus
    ->
M_A
    ->
blank interval
    ->
M_A-like dynamics.
```

Není nutné, aby existovala buňka:

```
memory_A = 1.
```

Informace může zůstávat distribuovaná v:

```
population state,
phase relations,
recurrent activity,
short-term synaptic state,
dynamic trajectory.
```

To je jeden z klíčových rozdílů mezi explicitní pamětí a dynamickým
perceptuálním stavem.


## 7.20 Aktivní a activity-silent složky

DPSH nemusí předpokládat, že celý percept musí být vždy reprezentován
silným ongoing firing.

Část kontextu může existovat v:

```
synaptic state,
altered excitability,
phase configuration,
latent connectivity.
```

Aktivní dynamika může některé části tohoto stavu znovu reaktivovat.

Perceptual Manifold tedy může obsahovat:

```
active components
```

i:

```
latent components.
```


## 7.21 Percept jako prediktivní stav

Pokud stav:

```
M_A
```

reprezentuje interní model určité situace, měl by generovat očekávání.

Tedy:

```
M_A
    ->
prediction P_A.
```

Následující senzorický vstup může být:

```
compatible
```

nebo:

```
incompatible.
```

Kompatibilní vstup podporuje:

```
persistence(M_A).
```

Nekompatibilní vstup zvyšuje pravděpodobnost:

```
transition(M_A -> M_B).
```

Tím se Perceptual Manifold propojuje s predictive processing.


## 7.22 Percept jako komprese historie

Současný stav:

```
M_A
```

může být výsledkem dlouhé předchozí sekvence:

```
X1 -> X2 -> X3 -> ... -> Xn.
```

Nemusí však explicitně uchovávat všechny jednotlivé události.

Může představovat komprimovaný důsledek jejich historie.

Tedy:

```
history
    ->
manifold state.
```

To může být výpočetně významné.

Další moduly nemusí znovu analyzovat celou minulost.

Mohou reagovat na současný dynamický stav.


## 7.23 Intuice jako čtení manifold

Tento mechanismus poskytuje další možnou interpretaci intuice.

Komplexní zkušenost dlouhodobě deformuje Perceptual Manifold.

Nová situace potom může velmi rychle přesunout systém:

```
S0 -> M_warning.
```

Akční nebo hodnoticí modul může reagovat:

```
M_warning -> avoid
```

aniž by bylo nutné explicitně rekonstruovat:

```
X1 -> X2 -> ... -> reason.
```

Intuice by tak mohla být funkcí rychlého čtení naučené geometrie
interního stavového prostoru.


## 7.24 Stav jako společná interní realita

Pokud více modulů reaguje na stejnou dynamickou strukturu:

```
P
```

může vzniknout sdílený interní referenční rámec.

Například:

```
perception,
memory,
value,
action,
language
```

mohou získávat odlišné projekce:

```
O_i = f_i(P).
```

Jeden modul z dynamického stavu odvodí:

```
"object is reachable",
```

jiný:

```
"object is dangerous",
```

další:

```
"object is named chair".
```

Nemusí přitom každý znovu rekonstruovat celý senzorický vstup.


## 7.25 Projekce manifold

Formálně lze modul `i` chápat jako transformaci:

```
O_i = G_i(P).
```

Různé moduly mají různé observables.

Perceptual Manifold tedy může fungovat jako:

```
common latent dynamic state
```

s více funkčními projekcemi.


## 7.26 Percept formation versus global accessibility

Je nutné oddělit:

```
existence M_A
```

od:

```
access(M_A).
```

Perceptuální stav může existovat lokálně nebo distribuovaně, aniž je
automaticky dostupný všem subsystémům.

Global Workspace může následně umožnit:

```
M_A
    ->
global broadcast.
```

DPSH tedy rozlišuje:

```
percept formation
```

a:

```
global access.
```


## 7.27 Percept bez reportu

Toto rozlišení umožňuje experimentální možnost:

```
perceptual dynamics present
```

ale:

```
explicit report absent.
```

Síť může například:

```
use state for action
```

aniž jej poskytne:

```
language/report module.
```

Tím lze modelovat implicitní nebo intuitivní zpracování.


## 7.28 Causal relevance

Pouhá dekodovatelnost nestačí.

Pokud lze z aktivity dekódovat:

```
A
```

neznamená to automaticky, že stav `A` systém používá.

Proto DPSH vyžaduje kauzální test.

Pokud perturbujeme:

```
M_A -> M_B,
```

musí se změnit:

```
future interpretation
nebo
behavior.
```

Teprve tehdy můžeme tvrdit, že stav je funkčně relevantní.


## 7.29 Operační definice perceptuálního stavu

Pro experimentální účely označíme stav `M_A` za perceptuální pouze
tehdy, pokud splňuje minimálně následující kritéria.

### 1. Decodability

Z populační dynamiky lze rozlišit:

```
M_A
```

od:

```
M_B.
```

### 2. Persistence

Stav přetrvává déle než okamžitá senzorická událost.

### 3. Robustness

Malé perturbace jej okamžitě nezničí.

### 4. Metastability

Není rigidním permanentním fixed pointem.

### 5. History dependence

Jeho vznik nebo interpretace závisí na předchozím stavu.

### 6. Causal relevance

Perturbace stavu změní další zpracování nebo rozhodnutí.

### 7. Sensory grounding

Stav je systematicky vztahován k senzorické zkušenosti nebo kontextu.

### 8. Generalization

Není pouhým memorováním jednoho konkrétního vstupního patternu.


## 7.30 Metrika separability

Pro dva stavy:

```
M_A
M_B
```

lze měřit jejich separabilitu:

```
D(M_A, M_B).
```

Například pomocí:

```
centroid distance,
classifier accuracy,
manifold distance,
trajectory distance.
```

Pokud:

```
D >> within-state variance,
```

jsou stavy rozlišitelné.


## 7.31 Dwell time

Pro metastabilní stav definujeme:

```
T_dwell(M_A).
```

Je to doba, po kterou systém zůstává v dané oblasti před přechodem.

Distribuce:

```
P(T_dwell)
```

může charakterizovat dynamickou stabilitu perceptu.


## 7.32 Transition matrix

Pro množinu stavů:

```
{M1, M2, ..., Mk}
```

můžeme definovat:

```
P_ij =
    P(M_i -> M_j).
```

Vzniká transition matrix:

```
P.
```

Ta charakterizuje dynamickou geometrii Perceptual Manifold.


## 7.33 Transition entropy

Míru předvídatelnosti přechodů lze popsat entropií:

```
H_transition.
```

Nízká hodnota:

```
rigid dynamics.
```

Velmi vysoká:

```
chaotic/unstructured transitions.
```

DPSH předpokládá možnost mezilehlého režimu:

```
structured but flexible dynamics.
```


## 7.34 Trajectory reproducibility

Při opakované prezentaci stejného kontextu nemusí vzniknout stejné
spiky.

Přesto může existovat podobná makroskopická trajektorie.

Měříme:

```
similarity(T_A1, T_A2).
```

To umožní testovat, zda percept existuje na vyšší úrovni než konkrétní
spike sequence.


## 7.35 Perturbační stabilita

Po vytvoření:

```
M_A
```

aplikujeme perturbaci:

```
ε.
```

Sledujeme:

```
M_A
    ->
recovery to M_A
```

nebo:

```
M_A
    ->
transition to M_B.
```

Získáme tak hranici dynamické stability.


## 7.36 Experiment M1 – A / blank / ambiguous X

Základní perceptuální experiment:

```
A
    ->
blank
    ->
X_ambiguous
```

a:

```
B
    ->
blank
    ->
X_ambiguous.
```

`X_ambiguous` je v obou případech identický.

Správná reakce musí záviset na předchozím stavu:

```
A -> X -> Y_A

B -> X -> Y_B.
```

Během blank intervalu měříme:

```
S(t).
```

Hledáme dvě rozlišitelné oblasti:

```
M_A
M_B.
```

Pokud stav během blanku predikuje následné rozhodnutí, máme funkční
evidence interního perceptuálního kontextu.


## 7.37 Experiment M2 – state perturbation

Po vytvoření:

```
M_A
```

provedeme perturbaci směrem k:

```
M_B.
```

Pokud následná reakce na:

```
X_ambiguous
```

přejde z:

```
Y_A
```

na:

```
Y_B,
```

je stav kauzálně relevantní.


## 7.38 Experiment M3 – microscopic variability

Stejný stimulus opakujeme mnohokrát se stochasticitou.

Porovnáváme:

```
spike-level variability
```

a:

```
macrostate similarity.
```

DPSH předpokládá:

```
high microscopic variability
```

může koexistovat s:

```
high macrostate stability.
```


## 7.39 Experiment M4 – remove recurrence

Porovnáme:

```
recurrent network
```

a:

```
recurrence reduced/removed.
```

Pokud recurrence hraje zásadní roli v metastabilitě, očekáváme pokles:

```
persistence,
robustness,
context retention.
```


## 7.40 Experiment M5 – explicit memory control

Vytvoříme kontrolní model:

```
memory_cell = previous_context.
```

Ten může úlohu:

```
A -> blank -> X
```

vyřešit explicitně.

Porovnáme jej s dynamickou sítí.

Cílem není dokázat, že explicitní paměť je horší.

Cílem je zjistit, zda dynamická síť vykazuje dodatečné vlastnosti:

```
spontaneous transitions,
generalization,
phase sensitivity,
metastability,
perturbation recovery.
```


## 7.41 Experiment M6 – manifold after learning

Změříme state-space:

```
before learning
```

a:

```
after learning.
```

Sledujeme:

```
number of clusters,
basin geometry,
transition probabilities,
spontaneous/evoked similarity.
```

Pokud zkušenost skutečně deformuje manifold, musí být změna
kvantifikovatelná.


## 7.42 Experiment M7 – spontaneous replay

Po učení odstraníme vstup:

```
I_external = 0.
```

Sledujeme, zda spontánní trajektorie navštěvují oblasti:

```
M_A,
M_B,
...
```

které byly dříve spojeny se senzorickými zkušenostmi.

To propojuje metastabilní manifold s hypotézou spontaneous learning.


## 7.43 Experiment M8 – context switching

Systém umístíme do různých kontextů:

```
C1
C2.
```

Stejný stimulus:

```
X
```

může vést:

```
C1 + X -> M_A
```

a:

```
C2 + X -> M_B.
```

Pokud ano, manifold není pevnou lookup tabulkou vstupů.

Je kontextově dynamický.


## 7.44 Experiment M9 – generalization

Síť trénujeme na množině variant perceptu:

```
A1,
A2,
A3.
```

Poté prezentujeme nový:

```
A4.
```

Pokud:

```
A4 -> M_A,
```

pak perceptuální oblast zachycuje obecnější strukturu než přesný
memorovaný pattern.


## 7.45 Experiment M10 – manifold fragmentation

Budeme postupně narušovat:

```
phase,
timing,
recurrence,
stochasticity.
```

Sledujeme, zda:

```
M_A
```

zůstává jednou koherentní oblastí, nebo se rozpadá na fragmenty.

Tím lze určit, které mechanismy drží perceptuální strukturu pohromadě.


## 7.46 Perceptual Manifold a škálování

S rostoucím počtem neuronů:

```
N
```

může růst počet dostupných dynamických konfigurací.

Není však automaticky pravda:

```
larger N -> better percept.
```

Je nutné měřit:

```
effective dimensionality,
redundancy,
manifold separability,
computational cost.
```

Možná existuje optimální vztah mezi:

```
number of units,
connectivity,
stochasticity,
temporal structure.
```


## 7.47 Fenomenální otázka

Pokud systém vytvoří:

```
robust,
integrated,
history-dependent,
predictive,
causally effective
```

metastabilní Perceptual Manifold,

stále z toho nelze přímo odvodit:

```
phenomenal experience.
```

DPSH proto zachovává hranici:

```
functional perceptual state
    != proven quale.
```

Silnější fenomenální hypotéza zůstává otevřená.


## 7.48 Proč je tato kapitola centrální

Předchozí mechanismy:

```
stochasticity,
oscillations,
noncommutativity,
symmetry breaking
```

jsou prostředky.

Metastabilní Perceptual Manifold je objekt, jehož vznik se snažíme
vysvětlit.

Pokud taková dynamická struktura v experimentu nevznikne, nemá smysl
pokračovat ke Global Workspace ani k fenomenální interpretaci.

Proto je tato kapitola experimentálním středem celé DPSH.


## 7.49 Falsifikační kritéria

Hypotéza metastabilního Perceptual Manifold bude oslabena, pokud:

1. interní stavy nelze spolehlivě separovat,
2. stav nepřetrvává přes blank interval,
3. perturbace interního stavu nemění následné rozhodnutí,
4. stejný percept vyžaduje téměř identickou mikroskopickou aktivitu,
5. state-space struktura se po učení nemění,
6. předchozí stav nemění interpretaci identického následného vstupu,
7. explicitní jednoduchá paměťová proměnná vysvětlí všechny pozorované
   efekty bez ztráty relevantních vlastností,
8. dynamický stav nenese informaci nad rámec aktuálního vstupu,
9. žádná oblast stavového prostoru nevykazuje metastabilní charakter.

V takovém případě musí být centrální představa DPSH zásadně
přeformulována.


## 7.50 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H6:

> **H6 – Metastable Perceptual Manifold Hypothesis**
>
> Perceptuálně relevantní informace může být reprezentována jako
> distribuovaná metastabilní oblast nebo rodina trajektorií globálního
> stavového prostoru rekurentní neuronální sítě. Identita takového stavu
> přetrvává přes mikroskopickou variabilitu jednotlivých spikeů,
> zachovává část senzorické historie a kauzálně ovlivňuje interpretaci
> následných vstupů.

Silnější predikce:

> Pokud percept skutečně odpovídá metastabilní dynamické struktuře,
> potom musí být možné z populační trajektorie dekódovat interní kontext,
> tento stav musí přetrvávat bez bezprostředního senzorického vstupu a
> jeho cílená perturbace musí měnit následnou interpretaci nebo chování
> systému.

DPSH tedy v této fázi tvrdí:

```
percept
    =
functionally relevant metastable population dynamics
```

nikoli:

```
percept
    =
static activation pattern.
```

A stále netvrdí:

```
metastable state
    =
phenomenal quale.
```

Tento poslední vztah zůstává samostatnou otevřenou hypotézou.
