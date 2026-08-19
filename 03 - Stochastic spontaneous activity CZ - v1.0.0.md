# 3. Spontánní stochastická aktivita

## 3.1 Aktivní síť bez vnějšího vstupu

Jedním ze základních předpokladů Dynamic Perceptual State Hypothesis
je, že absence nového senzorického vstupu neznamená absenci neuronální
dynamiky.

Formálně:

```
I_external(t) = 0
```

neimplikuje:

```
dS(t)/dt = 0.
```

Neuronální systém může zůstávat aktivní i v okamžiku, kdy nedochází
k významné změně vnějšího prostředí.

Tato vlastnost je důležitá pro hypotézu kontinuálního perceptu.

Pokud by interní dynamika existovala pouze jako bezprostřední reakce
na externí vstup, potom by bylo přirozené popisovat percepci jako
posloupnost transformací:

```
input
  ->
processing
  ->
output
  ->
inactivity.
```

DPSH předpokládá odlišný režim:

```
previous state
     |
     v
ongoing dynamics <---- sensory input
     |
     v
 new state
     |
     +-------------> ongoing dynamics
```

Senzorický vstup tedy nevytváří dynamiku systému od začátku.

Modifikuje dynamiku, která již existuje.


## 3.2 Spontánní aktivita a stochasticita nejsou totéž

Je nutné rozlišovat dva související, ale odlišné pojmy.

**Spontánní aktivita** znamená, že neuron nebo neuronální populace může
vykazovat aktivitu bez bezprostředního externího stimulu.

**Stochasticita** znamená, že vývoj systému není za stejných
makroskopických podmínek zcela deterministický.

Spontánní aktivita může být deterministická.

Například oscilátor může generovat pravidelnou aktivitu:

```
spike -> wait -> spike -> wait -> spike
```

bez jakéhokoli externího vstupu.

Naopak stochastický neuron může mít pravděpodobnost spiku:

```
P(spike_i, t) = p_i(t)
```

a konkrétní okamžik spiku není předem jednoznačně určen.

DPSH předpokládá přítomnost obou vlastností:

```
spontaneous activity
        +
   stochasticity.
```

Jejich funkce však musí být experimentálně rozlišeny.


## 3.3 Baseline firing

Pro neuron `Ni` definujeme základní pravděpodobnost spontánní aktivity

```
p0_i > 0.
```

Ta představuje baseline firing.

Neznamená to, že neuron musí pravidelně vysílat spike.

Znamená to pouze, že i bez významného externího vstupu existuje
nenulová pravděpodobnost události:

```
P(spike_i | I_external = 0) > 0.
```

Aktuální pravděpodobnost může být modifikována stavem neuronu:

```
P(spike_i, t) =
    F(
        p0_i,
        membrane_state_i,
        recurrent_input_i,
        oscillatory_input_i,
        adaptation_i,
        history_i
    ).
```

Baseline firing tedy není nezávislý generátor náhodných spikeů.

Je jednou ze složek dynamiky neuronu.


## 3.4 Spike jako lokální perturbace systému

Spontánní spike lze chápat jako malou lokální perturbaci.

Neuron:

```
Ni
```

vygeneruje událost:

```
ei(t).
```

Ta se prostřednictvím synapsí může šířit:

```
Ni
 |
 +----> Nj
 |
 +----> Nk
 |
 +----> Nl.
```

Ve většině případů může spontánní spike rychle zaniknout bez
makroskopického důsledku.

V jiném dynamickém kontextu však může stejná událost zasáhnout systém,
který se nachází blízko přechodu mezi dvěma stavy:

```
M_A ~ M_B.
```

Potom malá fluktuace může být rekurencí zesílena:

```
stochastic spike
      ->
local perturbation
      ->
recurrent amplification
      ->
population transition
      ->
M_B.
```

Stochasticita tak poskytuje mechanismus, kterým může systém spontánně
přecházet mezi dostupnými oblastmi svého stavového prostoru.


## 3.5 Stochasticita jako explorace stavového prostoru

Předpokládejme, že síť má množinu potenciálně dostupných stavů:

```
Ω = {S1, S2, ..., Sn}.
```

Čistě deterministická dynamika může při stejných počátečních
podmínkách opakovaně sledovat stejnou trajektorii:

```
S0 -> S1 -> S2 -> S3 -> ...
```

Malá stochasticita umožňuje odchylky:

```
              -> S2a -> ...
            /
S0 -> S1 -> S2
            \
              -> S2b -> ...
```

Systém tím může navštěvovat alternativní oblasti stavového prostoru.

DPSH označuje tuto možnou funkci jako:

```
state-space exploration.
```

Neznamená to, že neuron nebo síť aktivně "hledá" řešení.

Explorace je makroskopickým důsledkem lokální stochasticity.


## 3.6 Stochasticita a učení vnitřních stavů

Tato vlastnost může být významná v kombinaci s plasticitou.

Předpokládejme spontánní trajektorii:

```
S_A -> S_B -> S_C.
```

Pokud během této trajektorie dochází k lokální plasticitě:

```
spike_i
   +
spike_j
   +
Δt
   ->
Δw_ij,
```

může samotná interní dynamika postupně měnit budoucí pravděpodobnost
přechodů.

Tím vzniká zpětná vazba:

```
spontaneous dynamics
       |
       v
   plasticity
       |
       v
modified connectivity
       |
       v
modified dynamics
       |
       +----------------+
                        |
                        v
                further plasticity.
```

Toto je jeden z kandidátních mechanismů toho, co pracovně označujeme
jako **učení hlubokého stavu** (*Deep State Learning*).

Silná verze hypotézy říká:

> Síť se nemusí učit pouze vztah mezi externím vstupem a požadovaným
> výstupem. Prostřednictvím vlastní ongoing aktivity může měnit
> pravděpodobnost a stabilitu svých interních dynamických stavů.

Toto tvrzení není v DPSH přijímáno jako fakt.

Je experimentální hypotézou.


## 3.7 Reaktivace zkušenosti

Pokud předchozí zkušenost změnila synaptickou strukturu sítě, spontánní
aktivita již neprobíhá v původním stavovém prostoru.

Učení změnilo jeho dynamiku:

```
Ω_before
    ->
experience
    ->
plasticity
    ->
Ω_after.
```

Spontánní aktivita v `Ω_after` proto může preferenčně navštěvovat
trajektorie podobné stavům vytvořeným předchozí zkušeností.

Schematicky:

```
external experience

    A -> B -> C

         |
         v

     plasticity

         |
         v

spontaneous dynamics

    A' -> B' -> C'.
```

Nemusí jít o přesnou reprodukci původních spikeů.

Podstatná může být podobnost makroskopické trajektorie.

DPSH proto předpokládá možnost, že spontánní aktivita umožňuje
opakovanou interní reaktivaci struktur vytvořených zkušeností.

Pokud při této aktivitě zůstává aktivní plasticita, může taková
reaktivace dále měnit dynamiku sítě.


## 3.8 Spontánní aktivita jako prevence dynamicky mrtvých stavů

Síť bez spontánní aktivity může za určitých podmínek skončit ve stavu:

```
S_dead
```

pro který:

```
no input
    ->
no spike
    ->
no state transition
    ->
no plasticity.
```

Takový stav je stabilní, ale výpočetně nezajímavý.

DPSH zkoumá možnost, že malá baseline aktivita snižuje pravděpodobnost
uvíznutí v podobných dynamicky mrtvých stavech.

Spontánní spike může:

```
disturb S_dead
    ->
activate local circuit
    ->
expose new synaptic interaction
    ->
initiate new trajectory.
```

Tato vlastnost může být zvlášť významná pro systém, jehož učení závisí
na lokální aktivitě.

Synapse, které nejsou nikdy aktivovány, nemají příležitost účastnit se
timing-dependent plasticity.

Spontánní aktivita proto může potenciálně poskytovat nízkou úroveň
průběžného "testování" existujících vazeb.


## 3.9 Proč nestačí maximální stochasticita

Pokud by stochasticita byla sama zdrojem užitečné dynamiky, mohlo by se
zdát, že její zvýšení musí systém zlepšovat.

DPSH předpokládá opak.

Při příliš vysoké stochasticitě:

```
structured causal influence
        <<
   random transitions.
```

Systém potom ztrácí schopnost udržovat metastabilní strukturu.

Můžeme proto předpokládat tři režimy:

### Režim A – nízká stochasticita

```
σ ~ 0
```

Možné důsledky:

```
rigid dynamics,
repeated trajectories,
dead states,
poor exploration.
```

### Režim B – střední stochasticita

```
σ = σ*
```

Možné důsledky:

```
exploration,
spontaneous transitions,
metastability,
sensitivity to weak evidence,
continued plasticity.
```

### Režim C – vysoká stochasticita

```
σ >> σ*
```

Možné důsledky:

```
unstable representations,
excessive transitions,
loss of temporal structure,
poor prediction,
loss of percept persistence.
```

Z toho plyne testovatelná predikce:

```
perceptual performance = G(σ)
```

nemusí být monotónní.

Může mít maximum pro nenulovou hodnotu:

```
σ* > 0.
```


## 3.10 Stochasticita a narušení symetrie

Stochasticita získává další význam v situaci, kdy existuje několik
podobně stabilních stavů:

```
M_A ~ M_B.
```

Například ambivalentní senzorický vstup může být kompatibilní s oběma
interpretacemi.

Bez jakékoli asymetrie by systém mohl teoreticky zůstat v nestabilním
mezistavu.

Malá fluktuace však může vytvořit:

```
activity_A = activity_B + ε.
```

Pokud rekurentní dynamika tuto odchylku zesílí:

```
ε
  ->
recurrent amplification
  ->
M_A,
```

dojde ke spontánnímu narušení symetrie.

Stochasticita zde neurčuje strukturu výsledného perceptu.

Pouze iniciuje výběr mezi stavy, jejichž struktura již vyplývá
z dynamiky sítě a senzorických omezení.

To je důležité rozlišení.

```
stochasticity != percept structure
```

ale potenciálně:

```
stochasticity
    ->
selection among available perceptual structures.
```


## 3.11 Stochasticita a metastabilita

Stabilní attractor může systém uzamknout:

```
S -> M_A -> M_A -> M_A -> ...
```

Čistý chaos naopak neposkytuje dostatečnou perzistenci:

```
S1 -> S7 -> S3 -> S19 -> ...
```

DPSH hledá režim mezi těmito extrémy:

```
metastability.
```

V něm systém po určitou dobu udržuje:

```
S(t) in M_A
```

ale současně existuje nenulová pravděpodobnost:

```
P(M_A -> M_B) > 0.
```

Stochasticita může být jedním z mechanismů, který umožňuje opuštění
současného metastabilního stavu.

Přechod však nemusí být řízen stochasticitou samotnou.

Jeho pravděpodobnost může záviset na:

```
sensory evidence,
prediction error,
oscillatory phase,
recurrent state,
adaptation,
plasticity,
stochastic fluctuation.
```

Obecně:

```
P(M_A -> M_B) =
    F(
        evidence,
        prediction,
        phase,
        history,
        noise
    ).
```


## 3.12 Stochasticita a oscilace

Samotná stochasticita nevytváří časovou strukturu.

Lokální oscilace však mohou měnit pravděpodobnost spontánního spiku
v čase.

Například:

```
P(spike_i, t) =
    p0_i + A * f(φ(t)).
```

Spontánní aktivita tím přestává být časově homogenní.

Spike je pravděpodobnější v některých fázích než v jiných.

Vzniká kombinace:

```
stochasticity
     +
temporal constraint.
```

To umožňuje síti zachovat explorativní charakter stochasticity a
současně vytvářet strukturované časové vztahy.

Pracovní hypotéza DPSH proto není:

```
noise -> percept.
```

Je:

```
stochastic exploration
        +
oscillatory organization
        +
recurrent selection
        +
plasticity
        +
sensory constraints
        ->
structured metastable dynamics.
```


## 3.13 Stochasticita a predictive processing

Predictive processing poskytuje mechanismus, kterým může být spontánní
dynamika omezena realitou.

Předpokládejme, že stochasticita vytvoří kandidátní stav:

```
M_X.
```

Tento stav generuje predikci:

```
P_X.
```

Pokud senzorická evidence odpovídá:

```
error(P_X, I) ~ 0,
```

může stav zůstat relativně stabilní.

Pokud však:

```
error(P_X, I) >> 0,
```

predikční chyba může jeho stabilitu snížit.

Dostáváme tedy:

```
stochasticity
    ->
candidate states
    ->
prediction
    ->
comparison with environment
    ->
stabilization / destabilization.
```

Systém tak může generovat interní variabilitu, aniž by byl odtržen od
vnější reality.


## 3.14 Percepce jako řízená stochasticita

Z předchozích bodů vyplývá pracovní interpretace:

> Perceptuální dynamika může vznikat jako řízený stochastický proces,
> ve kterém lokální fluktuace umožňují exploraci, zatímco naučená
> konektivita, rekurence, oscilace a senzorická predikce omezují
> pravděpodobné trajektorie systému.

Tím vzniká důležitý rozdíl mezi:

```
random state
```

a

```
stochastic state.
```

Random stav postrádá stabilní strukturu.

Stochastický dynamický stav může být vysoce strukturovaný, přestože jeho
přesná mikroskopická trajektorie není deterministická.

To vede k jedné z důležitých vlastností DPSH:

> Stejný percept nemusí při každém výskytu odpovídat stejné konfiguraci
> jednotlivých spikeů.

Dvě realizace:

```
E_A1
```

a

```
E_A2
```

mohou být mikroskopicky rozdílné, ale jejich globální trajektorie může
patřit do stejné perceptuální oblasti:

```
E_A1 -> M_A

E_A2 -> M_A.
```

Perceptuální identita by tedy existovala na makroskopické, nikoli
mikroskopické úrovni.


## 3.15 První silná predikce

Pokud má spontánní stochasticita funkční roli při tvorbě interních
stavů, musí existovat experimentálně pozorovatelný rozdíl mezi:

```
stochastic network
```

a

```
otherwise equivalent deterministic network.
```

Nestačí však porovnat pouze výslednou accuracy.

Je nutné sledovat:

```
number of metastable states,
state lifetime,
transition probability,
state-space coverage,
trajectory diversity,
robustness,
generalization,
recovery after perturbation,
spontaneous/evoked state similarity.
```

DPSH předpovídá, že vhodná nenulová stochasticita zvýší alespoň některé
z těchto vlastností bez ztráty perceptuální separability.


## 3.16 Experiment S1 – sweep spontánní aktivity

První základní experiment v Cognia bude měnit baseline stochasticitu:

```
σ = {
    0,
    0.001,
    0.005,
    0.01,
    0.05,
    0.1,
    ...
}.
```

Přesné hodnoty budou záviset na implementovaném neuronálním modelu.

Pro každou hodnotu změříme:

```
firing rate,
number of active neurons,
state-space coverage,
number of metastable clusters,
cluster lifetime,
transition entropy,
response to sensory perturbation,
perceptual task performance.
```

Hypotéza předpokládá existenci nenulové oblasti, ve které dynamická
struktura systému dosahuje lepších vlastností než při `σ = 0`.


## 3.17 Experiment S2 – spontánní aktivita po zkušenosti

Síť nejprve vystavíme strukturovanému prostředí:

```
A, B, C, D ...
```

a umožníme plasticitu.

Následně odstraníme externí vstup:

```
I_external = 0.
```

Porovnáme spontánní dynamiku:

```
before learning
```

a

```
after learning.
```

Pokud učení změnilo interní dynamický prostor, očekáváme:

```
spontaneous_before
    !=
spontaneous_after.
```

Silnější predikce je, že po učení bude spontánní aktivita častěji
navštěvovat oblasti stavového prostoru podobné stavům vyvolaným
naučenými senzorickými strukturami.

Měřit lze například:

```
D(spontaneous_state, evoked_state).
```

Tento experiment přímo testuje myšlenku, že zkušenost mění geometrii
interní dynamiky.


## 3.18 Experiment S3 – vypnutí spontaneous firing

Po naučení sítě vytvoříme dvě identické kopie:

```
Network A:
    baseline firing ON

Network B:
    baseline firing OFF.
```

Externí vstup bude následně na určitou dobu odstraněn.

Poté obnovíme neúplný nebo ambivalentní vstup.

Budeme testovat, zda předchozí interní stav ovlivňuje následnou
interpretaci a zda jeho zachování závisí na spontánní aktivitě.

Pokud:

```
spontaneous firing OFF
```

nemá žádný měřitelný vliv na:

```
state persistence,
later interpretation,
state-space structure,
learning,
```

pak bude hypotéza o jeho zásadní funkční roli oslabena.


## 3.19 Experiment S4 – oddělení noise od firing rate

Jedním z největších experimentálních rizik je záměna:

```
stochasticity
```

za pouhé:

```
increased activity.
```

Proto je nutné vytvořit kontrolu, ve které mají dvě sítě podobný:

```
mean firing rate,
spike count,
energy/activity level,
```

ale rozdílnou časovou stochasticitu.

Například:

```
Network A:
    stochastic spike timing

Network B:
    matched firing rate,
    deterministic or replayed timing.
```

Pokud se jejich makroskopická dynamika významně liší, bude možné
argumentovat, že relevantní veličinou není pouze množství aktivity,
ale její stochastická časová organizace.


## 3.20 Experiment S5 – frozen noise

Další důležitou kontrolou je tzv. frozen stochastic sequence.

Nejprve vygenerujeme konkrétní sekvenci náhodných událostí:

```
R = {r1, r2, ..., rn}.
```

Potom ji při opakovaných bězích použijeme identicky.

Porovnáme:

```
fresh stochasticity
```

proti:

```
identical replayed stochasticity.
```

Obě varianty mohou mít:

```
same spike probability,
same distribution,
same expected firing rate,
```

ale pouze první generuje nové mikroskopické trajektorie.

Tím lze rozlišit, zda je pro systém důležitá pouze přítomnost
noise-like signálu, nebo skutečná průběžná explorace nových trajektorií.


## 3.21 Falsifikační kritéria

Silná verze hypotézy o spontánní stochastické aktivitě bude oslabena,
pokud experimenty ukáží, že:

1. `σ = 0` vytváří stejně bohatou nebo bohatší metastabilní dynamiku,
2. zvýšení stochasticity pouze degraduje reprezentaci,
3. spontaneous firing po odstranění vstupu nijak nepřispívá k
   perzistenci interního stavu,
4. naučená zkušenost nemění strukturu spontánní aktivity,
5. stochastic timing nemá jiný efekt než odpovídající zvýšení firing
   rate,
6. spontaneous activity nepřispívá k plasticitě nebo budoucímu
   zpracování,
7. všechny předpokládané efekty lze vysvětlit jednodušším
   deterministickým mechanismem.

V takovém případě musí být stochasticita z centrálního mechanismu DPSH
odstraněna nebo přeřazena na vedlejší biologickou vlastnost.


## 3.22 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H2:

> **H2 – Functional Stochasticity Hypothesis**
>
> Nenulová spontánní stochastická aktivita v globálně netaktované
> rekurentní síti umožňuje exploraci interního stavového prostoru a
> v interakci s rekurencí, plasticitou a časovou organizací přispívá
> ke vzniku, udržování a přechodům mezi metastabilními populačními
> stavy. Existuje oblast stochasticity, ve které jsou tyto dynamické
> vlastnosti výraznější než v odpovídajícím deterministickém systému.

Hypotéza neříká, že stochasticita vytváří percept sama.

Tvrdí pouze, že může být jednou z kauzálně významných podmínek
dynamiky, ze které percept vzniká.

Její platnost musí být posuzována nezávisle na ostatních částech DPSH.
