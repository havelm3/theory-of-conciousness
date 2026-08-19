# 4. Endogenní oscilátory jako časová struktura

## 4.1 Čas uvnitř sítě

Dynamic Perceptual State Hypothesis rozlišuje mezi dvěma principiálně
odlišnými způsoby práce s časem.

První možností je čas vnucený systému zvenčí:

```
global clock
    ->
update all units
    ->
next global state.
```

Druhou možností je časová struktura vznikající uvnitř samotné sítě:

```
local dynamics
    ->
oscillatory activity
    ->
phase-dependent modulation
    ->
temporally structured interaction.
```

DPSH vychází z druhého principu.

Síť nemusí mít globální mechanismus určující, kdy má dojít k výpočtu.
Přesto může obsahovat velmi bohatou časovou organizaci.

Oscilace jsou v tomto pojetí součástí stavu systému.

Neurčují okamžiky globální aktualizace, ale mění podmínky, za kterých
jednotlivé lokální události získávají význam.


## 4.2 Globální clock není lokální oscilátor

Je nutné důsledně oddělit:

```
global update clock
```

od:

```
endogenous neural oscillator.
```

Globální clock říká:

```
"všechny jednotky nyní proveďte další krok."
```

Endogenní oscilátor říká pouze:

```
"v této části systému se právě nachází určitý časově proměnný signál."
```

Neuron může na tento signál reagovat, nemusí však čekat na jeho další
periodu, aby mohl zpracovat jinou událost.

Proto:

```
oscillator != scheduler.
```

Rešerše ukázala, že tento rozdíl má i technické precedenty:
existují event-driven spikingové systémy bez globálního clocku,
které přitom používají lokální oscilátory.


## 4.3 Oscilace jako součást neuronálního stavu

Pro lokální oscilátor `Ok` můžeme zavést stav:

```
Ok(t) = {
    phase,
    frequency,
    amplitude
}.
```

Jednoduchý periodický model může mít podobu:

```
Ok(t) = Ak * sin(ωk*t + φk).
```

Tato rovnice však není podstatou hypotézy.

Podstatné je, že `Ok(t)` vstupuje do dynamiky neuronů.

Například:

```
P(spike_i, t) =
    F(
        si(t),
        Ii(t),
        Ri(t),
        Ok(t),
        ξi(t)
    ).
```

Fáze tedy může měnit pravděpodobnost, že neuron v daném okamžiku vyšle
spike.

Stejný neuron se stejným vstupem proto nemusí reagovat stejně v různých
fázích:

```
response(input, phase_A)
    !=
response(input, phase_B).
```


## 4.4 Fáze jako dynamický kontext

V klasickém rate-based pohledu může být aktivita neuronu popsána
především veličinou:

```
firing_rate.
```

V DPSH však může být význam neuronu rozšířen o jeho vztah k lokální fázi:

```
neural_event =
    {
        source,
        time,
        phase_context
    }.
```

Dva spiky se stejným zdrojem a stejným přibližným firing rate mohou mít
odlišný funkční význam, pokud nastaly v různých fázích.

Rešerše ukázala experimentální precedent pro tuto myšlenku:
phase-of-firing coding může nést dodatečnou informaci nad rámec samotného
počtu spikeů.

Tím se čas nestává pouze fyzikální souřadnicí.

Stává se potenciální součástí neuronální reprezentace.


## 4.5 Oscilační modulace pravděpodobnosti

Pro stochastic neuron lze zavést okamžitou intenzitu spikování:

```
λ_i(t).
```

Ta může být ovlivněna například:

```
λ_i(t) =
    g(
        baseline_i,
        sensory_i(t),
        recurrent_i(t),
        phase_i(t),
        stochastic_state_i(t)
    ).
```

Oscilátor tedy nemusí spike přímo generovat.

Může pouze periodicky měnit:

```
excitability,
threshold,
synaptic gain,
spike probability,
plasticity sensitivity.
```

To je důležité.

Časová struktura může vznikat jako modulace pravděpodobnosti událostí,
nikoli jako jejich deterministické plánování.


## 4.6 Více lokálních oscilátorů

Síť nemusí obsahovat jediný dominantní rytmus.

Uvažujme množinu:

```
O = {O1, O2, ..., Om}.
```

Každý může mít vlastní:

```
frequency,
phase,
amplitude,
spatial influence,
coupling.
```

Neuron `Ni` může být ovlivněn podmnožinou:

```
O_i = {O2, O5, O8}.
```

Pak:

```
P(spike_i,t) =
    F(
        ...,
        φ2(t),
        φ5(t),
        φ8(t)
    ).
```

Tím vzniká kombinatoricky velmi bohatá časová struktura.

Stejný neuron se může ocitnout v jiném dynamickém kontextu podle toho,
jaké jsou právě relativní fáze více lokálních rytmů.


## 4.7 Relativní fáze

Pro dvě oscilace definujme:

```
Δφ_ij = φ_i - φ_j.
```

DPSH předpokládá, že některé funkční vlastnosti sítě mohou záviset spíše
na:

```
Δφ
```

než na absolutní fázi jednotlivého oscilátoru.

Například:

```
communication_efficiency =
    F(Δφ).
```

Pokud jsou dvě populace ve vhodném fázovém vztahu:

```
Δφ ~ Δφ_optimal,
```

může být účinnost přenosu vysoká.

Při jiné relativní fázi:

```
Δφ ~ Δφ_nonoptimal
```

může být přenos oslaben.

Tím vzniká možnost časově proměnlivé funkční konektivity bez změny
anatomických synapsí.


## 4.8 Dynamický routing

Pevná síť může mít topologii:

```
A -> B
A -> C
A -> D.
```

To však nemusí znamenat, že `A` komunikuje se všemi cíli stejně účinně
v každém okamžiku.

Pokud:

```
B is receptive at phase φ1
C is receptive at phase φ2
D is receptive at phase φ3,
```

pak stejný spike z `A` může mít rozdílný efekt:

```
A -> B  strong
A -> C  weak
A -> D  none.
```

V jiném okamžiku může být rozložení opačné.

Rešerše ukázala, že fáze lokální oscilace může skutečně měnit účinnost
příchozího spike volley a že interareální synchronizace může souviset
se selektivní effective connectivity.

DPSH proto pracuje s hypotézou:

> Relativní fáze může fungovat jako dynamický routing mechanismus.

Takový routing není řízen centrálním schedulerem.

Vzniká z okamžitého dynamického stavu populací.


## 4.9 Oscilace a stochasticita

Spontánní stochasticita generuje variabilitu:

```
possible spike
    ->
possible trajectory.
```

Oscilace mohou tuto variabilitu časově organizovat.

Místo:

```
random event probability = constant
```

může platit:

```
random event probability = phase-dependent.
```

Například:

```
P(spike_i,t)
    =
p0_i + A_i * f(φ(t)).
```

Tím vzniká zajímavá kombinace:

```
stochasticity
    ->
exploration
```

zatímco:

```
oscillatory phase
    ->
temporal constraint.
```

DPSH proto nepovažuje stochasticitu a oscilace za protiklady.

Naopak mohou tvořit jeden mechanismus:

```
variability
    +
temporal organization
    ->
structured stochastic dynamics.
```


## 4.10 Oscilace nemusí mít vlastní specializovanou buňku

Původní architektonická intuice může svádět k modelu:

```
oscillator cell
    ->
neuron population.
```

To je legitimní implementační možnost.

Rešerše však ukázala důležitý precedent:
populační oscilace mohou emergovat z rekurentních stochastic spikingových
jednotek, aniž by jednotlivé neurony byly samy intrinsic oscillators.

Proto DPSH rozlišuje dvě architektury.

### Explicitní oscilátor

```
oscillator unit
    ->
local population.
```

### Emergentní oscilace

```
recurrent population
    ->
population rhythm
    ->
modulation of population.
```

Hypotéza se nezavazuje k tomu, že vědomá dynamika potřebuje speciální
typ oscillator cell.

Podstatnější může být existence:

```
endogenous local oscillatory dynamics.
```


## 4.11 Oscilace jako emergentní makrostav

To vede k silnější možnosti.

Oscilace nemusí být pouze vstupem do perceptuální dynamiky.

Mohou být zároveň jejím výsledkem.

Tedy:

```
recurrent connectivity
    +
stochastic spiking
    ->
oscillatory population state.
```

A tento stav následně zpětně ovlivňuje:

```
spike timing,
communication,
plasticity.
```

Vzniká uzavřená smyčka:

```
local connectivity
      |
      v
population rhythm
      |
      v
  spike timing
      |
      v
   plasticity
      |
      v
modified connectivity
      |
      +--------------+
                     |
                     v
              population rhythm.
```

Tento cyklus představuje kandidátní mechanismus self-organization.


## 4.12 Oscilace a synaptická zpoždění

V globálně netaktované síti mají zpoždění zásadní význam.

Pro synapsi:

```
i -> j
```

definujeme:

```
d_ij.
```

Spike vyslaný v čase:

```
t_i
```

dorazí:

```
t_i + d_ij.
```

Pokud je cílový neuron modulován oscilací, účinek spiku závisí také na:

```
φ_j(t_i + d_ij).
```

Takže efekt synapse není pouze funkcí:

```
weight_ij.
```

Je funkcí:

```
effect_ij =
    F(
        weight_ij,
        delay_ij,
        arrival_phase,
        local_state_j
    ).
```

Dvě synapse se stejnou vahou mohou mít velmi odlišný funkční efekt,
pokud mají různé delays.


## 4.13 Časová topologie sítě

Z předchozího bodu plyne, že síť nemá pouze prostorovou topologii:

```
who is connected to whom.
```

Má také časovou topologii:

```
when can influence whom.
```

Tato topologie je dána kombinací:

```
synaptic delays,
oscillatory phases,
refractory periods,
adaptation,
stochastic spike timing.
```

DPSH proto považuje časovou strukturu sítě za stejně důležitou jako
samotnou konektivitu.


## 4.14 Oscilace a STDP

Pokud plasticita závisí na relativním timing pre- a postsynaptických
spikeů:

```
Δt = t_post - t_pre,
```

pak oscilace mohou nepřímo měnit učení tím, že strukturuji časování
spikeů.

Mechanismus:

```
oscillatory phase
    ->
spike probability
    ->
spike timing
    ->
STDP
    ->
synaptic structure.
```

Rešerše ukázala, že kombinace oscilatorického vstupu, spike timingu,
delays a STDP může skutečně selektovat konektivitu a vytvářet
distribuované attractorové struktury.

To znamená, že časová organizace nemusí pouze modulovat již naučenou
síť.

Může se aktivně podílet na tom, jak se síť naučí.


## 4.15 Uzavřená smyčka phase-plasticity

DPSH proto předpokládá možnost následující smyčky:

```
phase relations
    ->
spike timing
    ->
STDP
    ->
synaptic weights and effective delays
    ->
population dynamics
    ->
new phase relations.
```

Formálně:

```
Φ(t)
    ->
E(t)
    ->
W(t + dt)
    ->
S(t + dt)
    ->
Φ(t + dt).
```

Síť tím může postupně vytvářet časově kompatibilní dynamické struktury.

To je důležité pro vznik metastabilních stavů.


## 4.16 Rezonance

Pokud některé populace reagují preferenčně na určitou časovou strukturu,
může se objevit rezonance.

Například:

```
input frequency ≈ local preferred frequency
```

může vést k:

```
stronger propagation,
increased synchronization,
higher spike probability,
stronger plasticity.
```

Jiný vstup:

```
input frequency far from preferred frequency
```

může mít menší efekt.

To umožňuje selektivní zpracování bez potřeby explicitní logické brány.


## 4.17 Interference

Více oscilací může vytvářet kombinovanou časovou strukturu.

Pro dvě oscilace:

```
O1(t)
O2(t)
```

může jejich kombinace vytvářet okamžiky:

```
constructive alignment
```

a:

```
destructive alignment.
```

Neuron může reagovat přibližně na:

```
O_total(t) = O1(t) + O2(t).
```

DPSH neříká, že neuronální interference je totožná s kvantovou
interferencí.

Používá pouze obecný dynamický princip:

> Více periodických nebo kvaziperiodických vlivů může společně vytvářet
> časově proměnlivé oblasti zvýšené a snížené excitability.

Takové interference mohou významně rozšířit počet dostupných
dynamických konfigurací systému.


## 4.18 Cross-frequency coupling

Různé frekvence nemusí fungovat nezávisle.

Například pomalý rytmus může modulovat amplitudu nebo účinnost rychlejší
aktivity:

```
slow phase
    ->
fast oscillation amplitude.
```

Obecně:

```
A_fast(t) =
    F(φ_slow(t)).
```

Tím vzniká hierarchická časová struktura.

Pomalé rytmy mohou definovat širší dynamická okna, zatímco rychlejší
rytmy mohou organizovat jemnější timing událostí.

DPSH tuto vlastnost považuje za potenciálně relevantní pro hierarchické
uspořádání perceptuálního stavu.


## 4.19 Oscilace a nekomutativita

Pokud efekt události závisí na fázi, potom je pořadí událostí přirozeně
nekomutativní.

Například:

```
spike A at phase φ1
spike B at phase φ2
```

může vytvořit stav:

```
S_AB.
```

Opačné pořadí:

```
spike B at phase φ1
spike A at phase φ2
```

může vytvořit:

```
S_BA.
```

Obecně:

```
S_AB != S_BA.
```

Oscilace tedy poskytují jeden z mechanismů, který převádí časové pořadí
na odlišné trajektorie stavového prostoru.


## 4.20 Oscilace a narušení symetrie

Předpokládejme dvě konkurenční populace:

```
A
B.
```

Obě mají podobnou podporu:

```
support(A) ≈ support(B).
```

Pokud je však v daném okamžiku:

```
phase_A favorable
```

a:

```
phase_B unfavorable,
```

může stejný vstup způsobit:

```
response_A > response_B.
```

Malá časová asymetrie může být rekurencí zesílena:

```
phase difference
    ->
small activity difference
    ->
recurrent amplification
    ->
symmetry breaking
    ->
selected metastable state.
```

Tím může relativní fáze ovlivnit, který z několika možných perceptuálních
stavů bude realizován.


## 4.21 Oscilace a metastabilní stavy

DPSH nepředpokládá, že oscilace mají vytvářet jeden permanentně
synchronizovaný stav.

Naopak.

Oscilační struktura může umožnit:

```
temporary coherence
    ->
state formation
    ->
phase drift
    ->
reduced coherence
    ->
transition.
```

Tedy:

```
M_A
  ->
phase reorganization
  ->
transition
  ->
M_B.
```

Oscilace tak mohou přispívat současně k:

```
stabilization
```

i:

```
destabilization.
```

To je přirozeně kompatibilní s metastabilitou.


## 4.22 Percept jako fázově organizovaný makrostav

Silnější pracovní hypotéza této kapitoly je:

> Perceptuálně relevantní metastabilní stav nemusí být definován pouze
> množinou aktivních neuronů nebo jejich firing rates. Část jeho identity
> může být obsažena v relativních časových a fázových vztazích mezi
> neuronálními populacemi.

Pak dvě realizace mohou mít:

```
similar firing rates
```

ale:

```
different phase geometry.
```

A proto odpovídat různým dynamickým stavům:

```
M_A != M_B.
```

Toto je jedna z nejdůležitějších testovatelných částí DPSH.


## 4.23 Fázová geometrie

Pro množinu lokálních oscilací lze stav zjednodušeně popsat vektorem:

```
Φ(t) =
    (
        φ1(t),
        φ2(t),
        ...,
        φm(t)
    ).
```

Relativní fázové vztahy pak určují bod v tzv. fázovém prostoru.

DPSH zkoumá možnost, že některé perceptuální stavy odpovídají nejen
oblastem neuronálního state-space:

```
S(t) in M_A,
```

ale současně oblastem fázové geometrie:

```
Φ(t) in P_A.
```

Percept může tedy být definován kombinací:

```
neuronal state
    +
temporal organization.
```

Schematicky:

```
Percept_A =
    M_A × P_A.
```

Toto není konečná matematická definice.

Je to pracovní model pro experimentální testování.


## 4.24 Oscilace a kontinuita perceptu

Pokud se percept skládá z mnoha lokálních dynamických procesů, jejich
časová koordinace může umožnit dočasnou koherenci bez centrálního
řadiče.

Jednotlivé neurony mohou vstupovat a vystupovat z aktivity.

Přesto může přetrvávat relační struktura:

```
neuron set changes
```

ale:

```
phase organization persists.
```

To nabízí kandidátní mechanismus, jak může globální percept zůstávat
relativně stabilní, i když jeho mikroskopický neuronální substrát
neustále mění konfiguraci.


## 4.25 Explicitní versus emergentní oscilátor v Cognia

Cognia by měl experimentálně podporovat minimálně dvě varianty.

### Varianta A – explicitní oscilátor

Samostatná jednotka:

```
oscillator O {
    frequency
    phase
    amplitude
}
```

která generuje lokální modulační signál.

### Varianta B – emergentní oscilace

Rekurentní mikroobvod:

```
excitatory population
    +
inhibitory population
    +
delays
    ->
emergent rhythm.
```

Tyto dvě varianty musí být experimentálně odděleny.

Pokud obě vytvoří stejný relevantní efekt, potom:

```
oscillator cell
```

není nutnou součástí hypotézy.

Nutná může být pouze:

```
local oscillatory dynamics.
```

To odpovídá i závěru rešerše, že explicitní oscillator cells nejsou
nezbytným předpokladem populační oscilace.


## 4.26 Experiment O1 – phase scrambling

Toto je hlavní experiment kapitoly.

Nejprve vytvoříme síť, která vykazuje stabilní nebo metastabilní
perceptuální reprezentace.

Poté porovnáme:

```
condition A:
    phase relations intact
```

a:

```
condition B:
    phase relations scrambled.
```

Musíme co nejvíce zachovat:

```
mean firing rate,
spike count,
sensory input,
topology,
synaptic weights,
network size.
```

Manipulujeme především:

```
relative timing structure.
```

Měříme:

```
state separability,
metastable lifetime,
decoding accuracy,
transition entropy,
percept persistence,
behavioral performance.
```

Silná predikce:

```
Q_intact > Q_scrambled
```

i při:

```
firing_rate_intact ≈ firing_rate_scrambled.
```

Tento experiment byl i v rešerši identifikován jako hlavní kauzální test
hypotézy.


## 4.27 Experiment O2 – phase jitter

Phase scrambling je hrubá manipulace.

Proto zavedeme postupný jitter:

```
jitter = {
    0 ms,
    1 ms,
    2 ms,
    5 ms,
    10 ms,
    20 ms,
    ...
}.
```

Sledujeme, zda kvalita dynamického stavu klesá:

```
Q(jitter).
```

Pokud existuje konkrétní časová škála, při které začne reprezentace
kolabovat, získáme odhad temporal precision relevantní pro danou síť.


## 4.28 Experiment O3 – frequency shift

Při zachování přibližné amplitudy oscilace budeme měnit:

```
frequency.
```

Například:

```
f1,
f2,
f3,
...
```

Sledujeme:

```
state formation,
learning speed,
state stability,
transition probability.
```

Pokud existují preferované dynamické frekvence, nemusí být libovolné.

Mohou být výsledkem interakce:

```
synaptic delays,
refractory periods,
STDP windows,
recurrent topology.
```


## 4.29 Experiment O4 – explicitní versus emergentní oscilace

Porovnáme:

```
A:
    explicit oscillator units

B:
    emergent oscillatory microcircuits

C:
    matched nonoscillatory network.
```

Kontrolujeme přibližně:

```
firing rate,
network size,
input,
capacity.
```

Hlavní otázka:

> Je pro vznik metastabilních perceptuálních stavů důležitý konkrétní
> typ oscilátoru, nebo pouze existence funkční časové organizace?

Pokud:

```
A ≈ B > C,
```

pak hypotéza bude podporovat obecnější princip:

```
oscillatory dynamics
```

namísto:

```
oscillator cells.
```


## 4.30 Experiment O5 – relativní fáze mezi populacemi

Vytvoříme dvě funkčně propojené populace:

```
A
B.
```

Budeme systematicky měnit:

```
Δφ_AB.
```

Například:

```
0°
45°
90°
135°
180°.
```

Při stejném anatomickém spojení změříme:

```
effective transmission,
spike propagation,
downstream state changes.
```

Tím lze přímo testovat:

```
effective_connectivity =
    F(relative_phase).
```


## 4.31 Experiment O6 – fáze a ambivalentní percept

Síť dostane ambivalentní vstup podporující dva stavy:

```
M_A
M_B.
```

Před prezentací vstupu nastavíme různé relativní fáze lokálních
oscilací.

Pokud:

```
identical sensory input
    +
different initial phase configuration
```

vede systematicky k:

```
different perceptual state selection,
```

bude to evidence, že interní časový stav sítě ovlivňuje interpretaci
vstupu.

Tento experiment přímo propojuje oscilace s hysterezí a symmetry
breaking.


## 4.32 Experiment O7 – fáze a plasticita

Porovnáme:

```
phase structured + STDP

phase scrambled + STDP

phase structured + plasticity OFF

phase structured + rate-based plasticity.
```

Měříme:

```
learned state geometry,
state separability,
attractor/metastable structure,
generalization.
```

Tím lze určit, zda fázová organizace pouze krátkodobě moduluje aktivitu,
nebo skutečně formuje dlouhodobou strukturu sítě.


## 4.33 Falsifikační kritéria

Silná oscilační hypotéza bude oslabena, pokud:

1. phase scrambling při zachovaném firing rate neovlivní relevantní
   state-space dynamics,
2. phase jitter nebude mít systematický efekt,
3. relativní fáze nebude měnit effective connectivity,
4. oscilace nezvýší ani nezmění vznik metastabilních stavů,
5. nonoscillatory control network vytvoří stejné reprezentace se
   stejnou robustností,
6. phase-dependent plasticity nebude poskytovat žádnou výhodu oproti
   jednodušším learning rules,
7. všechny efekty oscilací bude možné vysvětlit pouze změnou firing rate,
8. počáteční fázový stav nebude mít žádný kauzální vliv na interpretaci
   ambivalentního vstupu.

V takovém případě musí být oscilace z centrální části DPSH odstraněny
nebo považovány pouze za jednu možnou implementaci obecnější časové
dynamiky.


## 4.34 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H3:

> **H3 – Endogenous Temporal Organization Hypothesis**
>
> V globálně netaktované rekurentní spikingové síti mohou lokální
> endogenní oscilace organizovat jinak stochastické spike události
> prostřednictvím fázově závislé excitability, komunikace a plasticity.
> Relativní fázové vztahy tím mohou představovat funkčně významnou
> stavovou proměnnou, která přispívá ke vzniku, stabilizaci a přechodům
> mezi metastabilními populačními stavy.

Silnější falsifikovatelná predikce je:

> Pokud relativní fáze skutečně nese kauzálně relevantní informaci,
> potom její specifické narušení při zachování průměrného firing rate,
> spike count, konektivity a senzorického vstupu musí selektivně
> poškodit alespoň některé vlastnosti metastabilního perceptuálního
> stavu.

Tato hypotéza netvrdí:

```
oscillation = percept
```

ani:

```
oscillation = consciousness.
```

Tvrdí pouze:

```
oscillatory temporal organization
    ->
functionally relevant structure
    ->
contribution to perceptual dynamics.
```

Teprve další kapitoly musí ukázat, zda tato organizace skutečně vede
ke vzniku integrovaného metastabilního perceptuálního stavu.
