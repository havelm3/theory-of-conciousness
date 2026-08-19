# 2. Formální model dynamického neuronálního systému

## 2.1 Základní předpoklad

Dynamic Perceptual State Hypothesis nepovažuje neuronální síť primárně
za posloupnost diskrétních transformací

```
S(t) -> S(t + 1)
```

řízených společným globálním krokem.

Základním objektem systému je autonomní dynamická jednotka, která
existuje v čase, udržuje vlastní interní stav, přijímá události
z ostatních jednotek a může v závislosti na svém stavu generovat
události nové.

Síť jako celek proto nemá jeden okamžik, ve kterém je kompletně
aktualizována.

Její globální stav je emergentním výsledkem současně probíhajících
lokálních procesů.

Pro systém tvořený `N` jednotkami lze globální stav formálně zapsat

```
S(t) = {s1(t), s2(t), ..., sN(t)}
```

kde `si(t)` představuje interní stav jednotky `i` v čase `t`.

Čas `t` zde nepředstavuje číslo globálního výpočetního kroku.

Je pouze souřadnicí, vůči které lze popsat kauzální vztahy mezi
událostmi.


## 2.2 Autonomní neuron

Neuron `Ni` je dynamická jednotka s vlastním stavem

```
si(t)
```

který může obsahovat například:

```
membrane potential
refractory state
activation history
adaptation state
stochastic state
local modulatory state
```

Přesná biologická věrnost jednotlivých parametrů není v první fázi
výzkumu cílem.

Podstatné jsou vlastnosti systému:

1. neuron má stav přetrvávající v čase,
2. jeho stav může být změněn příchozí událostí,
3. jeho stav se může měnit i bez externí události,
4. může generovat spike,
5. pravděpodobnost nebo okamžik spiku může záviset na jeho historii,
6. jeho aktualizace nevyžaduje současnou aktualizaci ostatních neuronů.

Obecně lze jeho dynamiku popsat jako

```
dsi/dt = Fi(
    si(t),
    Ii(t),
    Ri(t),
    Oi(t),
    Hi(t),
    ξi(t)
)
```

kde:

- `Ii(t)` je externí vstup,
- `Ri(t)` je rekurentní synaptický vstup,
- `Oi(t)` je oscilační/modulační vstup,
- `Hi(t)` reprezentuje relevantní historii,
- `ξi(t)` je stochastická komponenta.

Neuron tedy není pouze funkcí současného vstupu.

Jeho reakce závisí na jeho aktuálním dynamickém stavu.


## 2.3 Spike jako událost

Základní komunikační jednotkou je spike.

Spike chápeme jako časově lokalizovanou událost

```
ei = (i, t)
```

znamenající, že neuron `i` generoval spike v čase `t`.

Spike sám nemusí nést skalární hodnotu analogickou aktivaci běžného
umělého neuronu.

Informace může být obsažena v:

```
identitě zdroje,
počtu spikeů,
frekvenci spikeů,
relativním časování,
pořadí spikeů,
fázi vůči lokální oscilaci,
vztahu k aktivitě ostatních neuronů.
```

Základním nositelem informace tedy není nutně izolovaný spike.

Může jím být časoprostorová struktura množiny událostí

```
E = {e1, e2, ..., en}.
```


## 2.4 Globální netaktovanost

Systém neobsahuje mechanismus typu

```
for every neuron:
    calculate next state
```

následovaný globálním

```
commit next state.
```

Takový mechanismus by vytvořil diskrétní posloupnost globálních stavů

```
S0 -> S1 -> S2 -> ... -> Sn.
```

DPSH místo toho předpokládá lokální kauzalitu.

Pokud neuron `A` vyšle spike v čase

```
tA
```

a signál potřebuje k dosažení neuronu `B` dobu

```
dAB,
```

událost může ovlivnit neuron `B` v čase

```
tB = tA + dAB.
```

Neuron `C` může být mezitím ovlivněn zcela jinou událostí.

Neexistuje požadavek

```
tB = tC.
```

Globální stav systému se tedy mění jako důsledek časově rozptýlených
lokálních událostí.


## 2.5 Lokální kauzalita

Každá změna stavu musí mít lokální kauzální historii.

Pokud

```
si(t1) != si(t0),
```

musí být možné určit mechanismus, kterým změna vznikla:

```
previous internal dynamics,
incoming spike,
stochastic transition,
oscillator/modulator,
external sensory event,
plasticity event.
```

Tento princip je důležitý pro experimentální interpretaci.

Globální perceptuální stav nesmí být vytvořen operací enginu typu

```
create_global_state(...).
```

Musí vzniknout jako důsledek lokálních interakcí.

Jinak by systém předpokládal právě mechanismus, jehož emergentní vznik
se hypotéza snaží vysvětlit.


## 2.6 Synapse jako časově orientovaná vazba

Synapse mezi neurony `i` a `j` není pouze skalární váha.

Minimální abstraktní reprezentace je

```
Wij = {
    weight,
    delay,
    plasticity_state
}
```

Spike neuronu `i`

```
ei(t)
```

tedy nevytváří okamžitě změnu neuronu `j`.

Vytvoří kauzální událost

```
ei(t)
    ->
Wij
    ->
ej_input(t + dij)
```

kde `dij` je synaptické a/nebo axonální zpoždění.

Zpoždění není považováno pouze za implementační nedokonalost.

V globálně netaktovaném systému se může stát součástí výpočtu.

Dvě cesty

```
A -> B -> D
```

a

```
A -> C -> D
```

mohou mít různé celkové zpoždění.

Jejich signály se proto mohou v neuronu `D`:

```
časově překrýt,
minout,
interferovat,
zesílit,
nebo ovlivnit různé fáze jeho dynamiky.
```

Topologie sítě tak současně vytváří topologii časovou.


## 2.7 Stochasticita neuronu

Neuron nemusí mít deterministickou hranici

```
activation > threshold -> spike.
```

Obecnější model umožňuje

```
P(spike_i(t)) =
    F(si(t), Ii(t), Ri(t), Oi(t), ξi(t)).
```

I při minimálním vstupu může platit

```
P(spike_i) > 0.
```

Tento baseline firing nepovažujeme automaticky za chybu.

Je experimentální otázkou, zda umožňuje síti explorovat stavový prostor
a zda tím přispívá ke vzniku dynamických reprezentací.

Zároveň hypotéza nepředpokládá, že více stochasticity je vždy lepší.

Předpokládáme možnost vztahu

```
too little stochasticity
    -> rigid dynamics

intermediate stochasticity
    -> exploration + structure

too much stochasticity
    -> loss of coherence.
```

Existence takového optima musí být experimentálně ověřena.


## 2.8 Spontánní aktivita a absence vstupu

Důležitým důsledkem předchozího bodu je:

```
sensory input = 0
```

neimplikuje

```
neural dynamics = 0.
```

Síť může vykazovat spontánní aktivitu.

Její současný stav může ovlivňovat pravděpodobnost budoucích spontánních
událostí, takže:

```
S(t)
    ->
spontaneous activity
    ->
S(t + dt).
```

Síť tím pokračuje ve vlastní dynamice i bez nové senzorické informace.

Tento mechanismus je kandidátem pro:

```
exploration of internal state space,
maintenance of metastable states,
spontaneous transitions,
consolidation of learned dynamics.
```

Poslední bod je zatím hypotetický a musí být experimentálně testován.


## 2.9 Endogenní oscilátor

Oscilátor je samostatný dynamický prvek systému.

Lze jej abstraktně popsat například

```
Ok(t) = Ak * sin(ωk*t + φk)
```

nebo pomocí jiného periodického či kvaziperiodického dynamického
mechanismu.

Důležitější než konkrétní matematická forma jsou jeho architektonické
vlastnosti.

Oscilátor:

1. existuje uvnitř neuronálního systému,
2. vytváří lokálně dostupný signál,
3. může ovlivňovat neuronální excitabilitu,
4. může modulovat pravděpodobnost spiku,
5. může ovlivňovat plasticitu,
6. může být ovlivněn jinými částmi systému.

Oscilátor však neurčuje:

```
"nyní aktualizuj všechny neurony."
```

Proto platí

```
endogenous oscillator != global processing clock.
```


## 2.10 Více časových referencí

Síť může obsahovat množinu oscilátorů

```
O = {O1, O2, ..., Om}
```

s různými:

```
frequencies,
phases,
amplitudes,
spatial ranges,
coupling strengths.
```

Neuron může být ovlivněn více oscilátory:

```
P(spike_i, t) =
    F(
        ...,
        O1(t),
        O3(t),
        O7(t)
    ).
```

Význam spiku pak může záviset nejen na absolutním okamžiku jeho vzniku,
ale na jeho relativní pozici vůči několika lokálním časovým strukturám.

Například:

```
phase(O1) = 0.2π
phase(O3) = 1.4π
```

může představovat jiný dynamický kontext než

```
phase(O1) = 1.2π
phase(O3) = 0.4π
```

i pokud je okamžitý počet spikeů stejný.

Tím vzniká možnost časového kódování, které není založeno na globálních
hodinách.


## 2.11 Rezonance a selektivní komunikace

Pokud excitabilita neuronu závisí na oscilační fázi, stejný spike nemusí
mít ve všech okamžicích stejný účinek.

Může přibližně platit

```
response(spike, phase_A)
    !=
response(spike, phase_B).
```

Dvě neuronální populace proto mohou komunikovat efektivněji v určitých
vzájemných fázových konfiguracích.

Komunikační kanál není nutně pevně otevřen nebo uzavřen.

Jeho efektivní propustnost může být dynamickou funkcí času:

```
Cij(t) = F(φi(t), φj(t), ...).
```

To umožňuje, aby stejná anatomická síť vytvářela v různých okamžicích
různé funkční sítě.


## 2.12 Nekomutativita dynamiky

Protože stav neuronu závisí na historii a události přicházejí v různých
časech, obecně nelze předpokládat

```
A(B(S)) = B(A(S)).
```

Naopak očekáváme

```
A(B(S)) != B(A(S)).
```

Příchod událostí

```
A -> B
```

může vést k jinému stavu než

```
B -> A.
```

Nekomutativita může vznikat minimálně prostřednictvím:

```
membrane dynamics,
refractory periods,
synaptic integration,
adaptation,
phase dependence,
STDP,
recurrent feedback.
```

Důsledkem je, že neuronální systém nelze úplně charakterizovat pouze
množinou událostí, které v něm nastaly.

Je nutné znát také jejich kauzální a časové uspořádání.


## 2.13 Plasticita závislá na čase

Synaptická váha není nutně konstantní:

```
wij = const.
```

Obecně:

```
wij(t + dt) =
    wij(t) + Δwij.
```

Jedním z mechanismů může být závislost na relativním časování pre- a
postsynaptické aktivity:

```
Δt = t_post - t_pre
```

a

```
Δwij = G(Δt, local_state, modulators, ...).
```

Tím získává historie spikeů schopnost měnit samotný dynamický prostor,
ve kterém budou probíhat budoucí interakce.

Síť tedy současně:

```
evolves within its state space
```

a

```
modifies the structure of its state space.
```

To je klíčové pro učení.


## 2.14 Paměťová buňka

DPSH nevylučuje explicitní stavové nebo paměťové prvky.

Paměťová jednotka může například udržovat stav

```
M(t) = c
```

dokud určitá událost nezpůsobí

```
M(t) -> c'.
```

Takové jednotky mohou být užitečné pro pracovní paměť, řízení,
sekvenční úlohy nebo explicitní uchovávání informace.

Hypotéza však rozlišuje mezi:

```
stored state
```

a

```
emergent dynamic state.
```

Paměťová buňka uchovává explicitní hodnotu.

Metastabilní populační stav může uchovávat strukturu bez toho, aby
kterákoli jednotlivá jednotka musela držet její kompletní reprezentaci.

Toto rozlišení bude experimentálně důležité.

Cílem není prokázat, že explicitní paměťové prvky nejsou potřebné.

Cílem je zjistit, které druhy interní reprezentace mohou vzniknout
pouze z distribuované dynamiky.


## 2.15 Lokální versus globální stav

Žádný neuron nemusí obsahovat informaci o kompletním globálním stavu

```
S(t).
```

Neuron má přístup pouze k omezené množině informací:

```
local state,
incoming connections,
modulatory signals,
local oscillations,
internal history.
```

Globální stav

```
S(t)
```

je proto analytický popis systému pozorovatelem, nikoli nutně explicitní
datová struktura dostupná neuronům.

To je zásadní požadavek.

Pokud by Cognia engine udržoval objekt

```
GlobalPercept
```

a neurony z něj přímo četly, nevytvářeli bychom emergentní percept.

Pouze bychom jej implementovali jako skrytou centrální proměnnou.


## 2.16 Vznik makrostavu

Předpokládejme množství lokálních jednotek

```
N1 ... NN.
```

Jejich interakce mohou vytvořit kolektivní veličiny, které nejsou
vlastností žádné jednotlivé jednotky.

Označme takovou veličinu

```
Ψ(S).
```

`Ψ` může charakterizovat například:

```
population coherence,
cluster membership,
phase organization,
attractor occupancy,
metastable state identity.
```

DPSH předpokládá, že perceptuálně relevantní informace může existovat
právě na této makroskopické úrovni.

Analogicky k parametru uspořádání ve fyzikálním systému nemusí být
globální struktura explicitně reprezentována jednou komponentou.

Vzniká kolektivně.


## 2.17 Symmetry breaking

V některých situacích může několik globálních konfigurací představovat
podobně pravděpodobné dynamické možnosti:

```
M1 ~ M2 ~ M3.
```

Malé lokální fluktuace mohou být prostřednictvím rekurence zesíleny:

```
fluctuation
    ->
local advantage
    ->
recurrent amplification
    ->
population reorganization.
```

Výsledkem může být

```
M1 >> M2, M3.
```

Takový proces představuje kandidátní mechanismus spontánního výběru
jedné z několika možných perceptuálních interpretací.

Výběr nemusí provádět žádný centrální controller.


## 2.18 Metastabilní stav

Výsledný stav nemusí být permanentním attractorem.

Definujeme metastabilní stav `M` jako oblast stavového prostoru, ve
které dynamika systému po omezenou dobu zůstává, přestože jednotlivé
komponenty pokračují ve změně.

```
S(t) in M
```

pro

```
t0 < t < t1.
```

Potom může dojít k přechodu

```
M_A -> M_B.
```

Důležitými měřitelnými vlastnostmi budou:

```
lifetime,
internal variance,
transition probability,
separability,
robustness to perturbation,
dependence on sensory input,
dependence on previous state.
```

Percept je v DPSH kandidátně spojován právě s touto úrovní dynamické
organizace.


## 2.19 Hystereze

Pokud současný stav závisí na předchozí trajektorii, očekáváme
hysterezi.

Při změně vstupu

```
A -> B
```

nemusí přechod nastat ve stejném bodě jako při

```
B -> A.
```

Formálně:

```
transition_threshold(A -> B)
    !=
transition_threshold(B -> A).
```

Hystereze poskytuje experimentálně měřitelný indikátor toho, že síť
nevytváří reprezentaci pouze jako okamžitou funkci vstupu.

Její interpretace závisí na historii.


## 2.20 Prediktivní omezení dynamiky

Samovolná dynamika vytváří mnoho možných stavů.

Ne všechny odpovídají prostředí.

Proto zavádíme prediktivní mechanismus.

Interní stav generuje očekávání

```
P(t + dt) = G(S(t)).
```

Senzorický systém následně poskytne

```
I(t + dt).
```

Vzniká lokálně realizovaná odchylka

```
ε = I - P.
```

DPSH nepředpokládá, že musí existovat jeden centrální skalár

```
global_prediction_error.
```

Prediction error může být distribuovaný mezi mnoho lokálních okruhů.

Jeho funkcí je modifikovat dynamiku tak, aby stavy dlouhodobě
nekompatibilní se senzorickou evidencí ztrácely stabilitu.

Predikce tedy nevytváří percept přímo.

Působí jako omezení prostoru stavů, které mohou dlouhodobě přežívat.


## 2.21 Dynamický perceptuální stav

Na základě předchozích definic můžeme pracovní perceptuální stav
charakterizovat jako metastabilní makrostav `M`, který splňuje několik
vlastností:

1. vzniká distribuovanou lokální dynamikou,
2. není explicitně uložen v jedné jednotce,
3. přetrvává přes změny jednotlivých neuronálních aktivit,
4. je ovlivněn senzorickou evidencí,
5. závisí na předchozím stavu systému,
6. může ovlivnit následné zpracování,
7. může být dostupný více funkčním subsystémům,
8. lze jej odlišit od jiných stavů pomocí dynamiky populace.

Tato definice zatím neobsahuje požadavek fenomenální zkušenosti.

Definuje pouze kandidátní mechanistický substrát perceptu.


## 2.22 Perceptual Manifold

Množina dynamických perceptuálních stavů a přechodů mezi nimi vytváří
strukturovanou oblast globálního stavového prostoru.

Tuto strukturu označujeme pracovně jako

```
Perceptual Manifold.
```

Lze ji chápat jako

```
M = {
    perceptual states,
    trajectories,
    transition probabilities,
    learned constraints
}.
```

Perceptual Manifold tedy není statická mapa světa.

Je dynamickou strukturou možností, kterými se může interní stav systému
vyvíjet.

Učení může měnit jeho geometrii:

```
experience
    ->
plasticity
    ->
altered state-space geometry
    ->
altered future perception.
```

Známé nebo opakovaně zkušené struktury prostředí tak mohou odpovídat
oblastem dynamiky, do kterých systém přechází snadněji nebo které jsou
stabilnější.


## 2.23 Požadavky na Cognia engine

Z formálního modelu vyplývá první sada implementačních požadavků.

Cognia musí experimentálně umožnit minimálně:

1. autonomní stavové neurony,
2. event-driven šíření spikeů,
3. synaptická zpoždění,
4. stochastic baseline firing,
5. parametrizovatelnou excitabilitu,
6. refractory period,
7. lokální oscilátory,
8. modulaci neuronu oscilátorem,
9. více oscilátorů s různými fázemi a frekvencemi,
10. lokální timing-dependent plasticitu,
11. rekurentní konektivitu,
12. excitatorní i inhibitorní interakce,
13. explicitní paměťové buňky jako samostatný typ prvku,
14. průběžný běh bez resetu mezi jednotlivými vstupy,
15. záznam přesných časů spikeů,
16. záznam interních stavů neuronů,
17. záznam synaptických změn,
18. možnost experimentálně vypnout jednotlivé mechanismy,
19. možnost phase scrambling,
20. možnost timing scrambling při zachování spike count,
21. možnost synchronous control režimu,
22. export globální state-space trajektorie pro následnou analýzu.

Zvlášť důležitý je poslední bod.

Engine nesmí pouze poskytovat výsledný output.

Výzkumným objektem je samotná trajektorie:

```
S(t0) -> S(t1) -> ... -> S(tn).
```

Bez jejího měření nebude možné rozhodnout, zda skutečně vznikají
předpokládané metastabilní struktury.


## 2.24 Základní experimentální princip

Každý mechanismus musí být možné porovnat s kontrolní variantou.

Například:

```
stochastic ON  vs stochastic OFF
oscillators ON vs oscillators OFF
phase intact   vs phase scrambled
asynchronous  vs synchronous
STDP ON        vs STDP OFF
recurrence ON  vs recurrence reduced
history intact vs state reset.
```

Důležitým principem bude kontrolovat ostatní veličiny.

Pokud například phase scrambling současně dramaticky sníží firing rate,
nelze z výsledku usoudit, že příčinou změny byla fáze.

Proto se budeme snažit konstruovat experimenty typu:

```
same input
same topology
same approximate firing rate
same approximate spike count
same network capacity
```

ale

```
different temporal organization.
```

Tím lze testovat kauzální význam jednotlivých dynamických vlastností.


## 2.25 Výzkumná hypotéza kapitoly

Formální model vede k první obecné experimentální otázce:

> Může systém složený pouze z lokálně interagujících autonomních
> jednotek bez globálního update clocku spontánně vytvářet
> reprodukovatelné metastabilní makrostavy, jejichž identita,
> stabilita a přechody nesou informaci o senzorické historii systému?

Tuto otázku formulujeme jako dílčí hypotézu H1:

> **H1 – Globally Clockless Dynamics Hypothesis**
>
> Neuronální systém tvořený autonomními jednotkami, které si udržují
> vlastní interní stav, komunikují diskrétními událostmi a aktualizují
> se bez společného globálního update kroku, může prostřednictvím
> lokální kauzality a časově orientovaných vazeb vytvářet
> reprodukovatelné globální makrostavy. Absence globálního clocku není
> pouze implementační detail, ale podmínka, za které je časová
> struktura událostí nositelem informace.

Pokud ne, základní mechanistický předpoklad DPSH bude nutné zásadně
revidovat.

Pokud ano, následující kapitoly musí určit, které mechanismy jsou pro
vznik těchto stavů skutečně nezbytné a zda mohou plnit funkci
perceptuální reprezentace.
