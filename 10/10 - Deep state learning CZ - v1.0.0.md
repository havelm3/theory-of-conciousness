# 10. Učení dynamiky a Deep State Learning

## 10.1 Učení není pouze mapování vstupu na výstup

V běžném strojovém učení je cílem často nalézt transformaci:

```
input
    ->
output
```

tak, aby výsledný výstup minimalizoval určitou chybu.

Typický model tedy optimalizuje vztah:

```
Y = F(X).
```

Dynamic Perceptual State Hypothesis však předpokládá systém, jehož
funkční význam neleží pouze ve výsledném výstupu.

Důležitá je samotná dynamika:

```
S(t0)
    ->
S(t1)
    ->
S(t2)
    ->
...
```

Učení proto nemusí znamenat pouze změnu:

```
input -> output mapping.
```

Může znamenat také změnu:

```
state-space geometry,
transition probabilities,
metastable state stability,
temporal organization,
predictive structure.
```

Pracovní termín **Deep State Learning** označuje právě tuto druhou
úroveň učení.


## 10.2 Co znamená Deep State Learning

Deep State Learning zde neoznačuje hlubokou neuronovou síť ve smyslu
velkého počtu vrstev.

Slovo `deep` označuje skutečnost, že učení probíhá uvnitř dynamického
stavového prostoru systému.

Místo:

```
learn correct output
```

se systém učí:

```
which internal states should exist,
which states should be stable,
which transitions should be probable,
which temporal relations should be reinforced,
which predictions should follow from which states.
```

Schematicky:

```
experience
    ->
internal trajectory
    ->
local plasticity
    ->
modified future trajectories.
```


## 10.3 Učení jako změna dynamické geometrie

Uvažujme síť s dynamikou:

```
dS/dt = F(S, I, W).
```

Synaptické parametry:

```
W
```

určují část geometrie stavového prostoru.

Pokud učení změní:

```
W -> W',
```

změní se i dynamika:

```
F -> F'.
```

Tím se změní:

```
basins,
trajectories,
transition probabilities,
metastable states.
```

Učení lze tedy interpretovat jako deformaci:

```
Ω_before
    ->
Ω_after.
```


## 10.4 Zkušenost mění budoucí možnosti

Pokud systém opakovaně zažívá sekvenci:

```
A -> B -> C,
```

pak po učení nemusí pouze správně klasifikovat:

```
A,
B,
C.
```

Může se změnit samotná dynamika tak, že:

```
M_A -> M_B
```

je pravděpodobnější než:

```
M_A -> M_X.
```

Podobně:

```
M_B -> M_C
```

se může stát preferovanou trajektorií.

Zkušenost tak mění:

```
future possibilities.
```


## 10.5 Lokální plasticita

DPSH preferuje mechanismy, které mohou být realizovány lokálně.

Synapse:

```
w_ij
```

nemusí znát globální stav sítě.

Její změna může záviset například na:

```
presynaptic spike,
postsynaptic spike,
relative timing,
local phase,
modulatory signal,
prediction error,
current synaptic state.
```

Obecně:

```
Δw_ij =
    G(
        t_pre,
        t_post,
        φ_local,
        ε_local,
        w_ij,
        state_i,
        state_j
    ).
```


## 10.6 STDP jako základní časově citlivý mechanismus

Spike-timing-dependent plasticity umožňuje:

```
Δw_ij =
    F(t_post - t_pre).
```

Pořadí:

```
pre -> post
```

tedy může vést k jiné změně než:

```
post -> pre.
```

STDP proto přirozeně propojuje:

```
timing
```

a:

```
learning.
```

V rámci DPSH však STDP není samo o sobě cílem.

Je jedním z mechanismů, kterým se časová organizace může zapisovat do
budoucí dynamiky sítě.


## 10.7 Fáze jako modulátor učení

Pokud spike timing závisí na lokální oscilaci, pak:

```
oscillatory phase
    ->
spike timing
    ->
plasticity.
```

Silnější model může obsahovat přímo:

```
Δw_ij =
    G(
        Δt,
        φ_pre,
        φ_post
    ).
```

To znamená, že stejná dvojice spikeů nemusí mít stejný learning effect
v různých dynamických kontextech.


## 10.8 Zpoždění jako učitelná časová struktura

Synaptická zpoždění:

```
d_ij
```

mění okamžik, kdy informace dorazí k cíli.

Pokud plasticita selektivně posiluje cesty, jejichž signály dorazí ve
funkčně vhodném okamžiku, může se síť učit nejen:

```
who connects to whom,
```

ale také:

```
which temporal routes matter.
```

To vede k možnosti, že se učení zapisuje do:

```
connectivity
    +
effective timing.
```


## 10.9 Učení časové topologie

Po opakované zkušenosti může vzniknout:

```
path A
    ->
preferred timing
    ->
strengthened route.
```

Jiné cesty mohou oslabit.

Výsledkem je naučená časová topologie:

```
T_W.
```

Ta určuje:

```
when information can efficiently propagate.
```


## 10.10 Recurrence jako objekt učení

V rekurentní síti nemění plasticita pouze průchod informace dopředu.

Mění také:

```
feedback loops,
recurrent gain,
attractor geometry,
metastability.
```

Malá lokální změna může proto postupně změnit globální dynamický režim.


## 10.11 Učení metastabilního stavu

Před učením může určitá konfigurace existovat pouze krátce:

```
M_A
    ->
rapid decay.
```

Po opakované zkušenosti může plasticita vytvořit:

```
stronger recurrent support.
```

Pak:

```
lifetime(M_A) increases.
```

Učení tedy může stabilizovat perceptuální oblast, aniž ji nutně změnilo
na permanentní attractor.


## 10.12 Učení hranic mezi stavy

Stejně důležité jako stabilita samotného stavu jsou hranice mezi:

```
M_A
M_B.
```

Plasticita může změnit:

```
transition threshold,
basin size,
perturbation sensitivity.
```

Zkušenost tak může měnit způsob, jakým systém rozlišuje mezi podobnými
percepty.


## 10.13 Učení jako vytváření preference

Pokud síť opakovaně vidí:

```
A -> B,
```

může se vytvořit:

```
P(M_B | M_A) high.
```

Pokud:

```
A -> C
```

nastává zřídka:

```
P(M_C | M_A) low.
```

Systém se tím učí statistickou strukturu prostředí.


## 10.14 Učení a predictive processing

Prediction error poskytuje jeden z kandidátních modulačních signálů.

Pokud:

```
prediction is correct,
```

může být potřeba malé synaptické změny.

Pokud:

```
prediction error is high,
```

může se zvýšit:

```
local plasticity.
```

Obecně:

```
plasticity_gain =
    F(prediction_error).
```


## 10.15 Prediction error jako učící omezení

Důležité je nepředpokládat:

```
global optimizer.
```

Prediction error může pouze lokálně měnit pravděpodobnost synaptické
změny.

Například:

```
local unexpected event
    ->
increased local plasticity.
```

Globální zlepšení modelu potom vzniká z mnoha takových lokálních změn.


## 10.16 Učení interního modelu

Pokud systém opakovaně předpovídá:

```
B
```

po stavu:

```
A
```

a tato predikce je potvrzována, dynamika:

```
M_A -> M_B
```

se může zesílit.

Pokud predikce opakovaně selhává:

```
M_A -> M_B
```

může být oslabena.

Interní generativní model se tak zapisuje do dynamiky manifold.


## 10.17 Spontánní aktivita jako interní training signal

Zvláštní část DPSH je hypotéza, že učení nemusí probíhat pouze při
externím vstupu.

Pokud:

```
I_external = 0,
```

síť může stále generovat:

```
spontaneous trajectories.
```

Například:

```
M_A -> M_B -> M_C.
```

Pokud při tom zůstává aktivní plasticita, tyto interně generované
trajektorie mohou dále měnit:

```
W.
```


## 10.18 Ongoing learning

Tím vzniká mechanismus:

```
external experience
    ->
learned structure
    ->
spontaneous replay
    ->
further plasticity
    ->
modified internal structure.
```

Tento proces označujeme jako:

```
ongoing learning.
```

Je jednou z nejsilnějších částí Deep State Learning hypotézy.


## 10.19 Reaktivace bez externího teacheru

Při spontaneous replay systém nemá nový externí teaching signal.

Přesto může aktivovat:

```
previously learned assemblies,
transitions,
temporal sequences.
```

Tím se otevírá možnost:

```
consolidation
```

bez nové zkušenosti.


## 10.20 Konsolidace

Užitečný režim může vypadat:

```
experience
    ->
weak learned structure
    ->
replay
    ->
repeated local timing
    ->
strengthened useful transitions.
```

Tím se krátkodobě vzniklá struktura může stát stabilnější.


## 10.21 Generalizace

Spontánní dynamika nemusí přesně reprodukovat dřívější zkušenost.

Stochasticita může generovat:

```
variations around learned states.
```

Pokud plasticita zachová společné vztahy a odstraní náhodné detaily,
může vzniknout:

```
generalization.
```

Například:

```
A1,
A2,
A3
```

mohou postupně vytvořit širší:

```
M_A.
```


## 10.22 Nebezpečí self-reinforcement

Stejný mechanismus však může mít opačný důsledek.

Pokud síť spontánně vytvoří chybnou trajektorii:

```
M_X,
```

a plasticita ji automaticky zesílí:

```
M_X
    ->
stronger probability of M_X,
```

vzniká:

```
self-reinforcement.
```

Systém může zesilovat vlastní chyby.


## 10.23 Interní halucinace jako learning failure

Extrémní případ:

```
spontaneous state
    ->
plasticity
    ->
stronger spontaneous state
    ->
further plasticity.
```

Bez dostatečného externího constraintu může síť vytvořit interní
struktury, které nejsou podloženy prostředím.

Deep State Learning proto potřebuje mechanismus kontroly.


## 10.24 Senzorická evidence jako korekce učení

Externí svět poskytuje korekční signál.

Pokud interně posílený stav opakovaně generuje chybnou predikci:

```
prediction error high,
```

měl by být:

```
destabilized
nebo
relearned.
```

Tím se uzavírá smyčka:

```
internal learning
    <->
external validation.
```


## 10.25 Learning gate

Jednou z možností je modulovat, kdy je plasticita povolena.

Například:

```
plasticity =
    F(
        prediction confidence,
        novelty,
        reward,
        attention,
        internal state
    ).
```

Ne každý spike tedy musí automaticky měnit synapsi.


## 10.26 Consolidation gate

Spontánní replay může být užitečný pouze v některých stavech.

Můžeme proto zavést:

```
consolidation mode.
```

V něm:

```
spontaneous activity
    +
selected plasticity.
```

To může být později experimentálně porovnáno s:

```
always-on plasticity.
```


## 10.27 Homeostatická plasticita

Aby síť nekonvergovala k extrémním vahám, může potřebovat homeostatické
mechanismy.

Například:

```
target firing range,
weight normalization,
inhibitory balancing.
```

Homeostáza není v DPSH hlavním principem vědomí.

Může však být nezbytným stabilizačním mechanismem výzkumné architektury.


## 10.28 Plasticita excitace a inhibice

Učení nemusí měnit pouze excitační synapse.

Inhibiční struktura může být stejně důležitá pro:

```
competition,
state boundaries,
oscillations,
metastability.
```

Proto musí být možné experimentálně oddělit:

```
excitatory plasticity
```

a:

```
inhibitory plasticity.
```


## 10.29 Učení oscilatorické organizace

Pokud jsou lokální rytmy emergentní, plasticita může změnit i jejich:

```
frequency,
coherence,
phase relations.
```

Tedy:

```
learning
    ->
temporal organization.
```

Zároveň:

```
temporal organization
    ->
learning.
```

Vzniká obousměrná vazba.


## 10.30 Učení fázové geometrie

Pro lokální oscilátory:

```
O1 ... Om
```

můžeme sledovat:

```
Φ(t).
```

Po zkušenosti se může změnit pravděpodobnost určitých konfigurací:

```
P(Φ).
```

Učení tak nemusí vytvářet pouze neuronální assemblies.

Může vytvářet preferované fázové vztahy mezi nimi.


## 10.31 Učení dynamického routingu

Pokud communication efficiency závisí na relativní fázi:

```
C_ij = F(Δφ_ij),
```

může síť učením změnit:

```
phase relations
```

tak, aby některé komunikační cesty byly snadněji dostupné.

Výsledkem je naučený dynamický routing.


## 10.32 Deep State Learning a nekomutativita

Protože pořadí událostí mění plasticitu:

```
A -> B
    !=
B -> A,
```

učí se systém směrové sekvence.

Výsledná dynamika proto obsahuje historii zkušenosti.

Deep State Learning není pouze statistika výskytu.

Je také statistikou pořadí.


## 10.33 Deep State Learning a hystereze

Pokud zkušenost mění basiny a jejich hranice, může změnit i:

```
hysteresis width.
```

Například po opakovaném používání stavu:

```
M_A
```

může být:

```
easier to enter,
harder to leave.
```

Učení se tak může projevit jako změna dynamické setrvačnosti perceptu.


## 10.34 Deep State Learning a intuition

Po dlouhém učení může být cesta:

```
input X -> M_A
```

velmi krátká a dynamicky preferovaná.

Systém pak může rychle dospět k relevantnímu makrostavu bez explicitní
rekonstrukce všech naučených pravidel.

Takový mechanismus může poskytovat funkční základ intuitivního
rozhodování.


## 10.35 Explicitní znalost versus implicitní geometrie

Systém může mít znalost reprezentovanou explicitně:

```
rule:
    if X then Y.
```

Nebo implicitně:

```
geometry causes:
    X -> M_Y.
```

Druhá forma nemusí být přímo dostupná pro symbolický report.

Přesto může ovlivnit rozhodování.


## 10.36 Učení Global Workspace přístupu

Později může být učitelné také:

```
which perceptual states gain workspace access.
```

Například stavy s vysokou:

```
novelty,
uncertainty,
relevance,
prediction error
```

mohou častěji získat globální dostupnost.

Tato část však patří do další kapitoly.


## 10.37 Více časových škál učení

Synaptické změny mohou mít různé časové konstanty.

Například:

```
fast plasticity
    ->
short-term adaptation.

slow plasticity
    ->
long-term state-space geometry.
```

DPSH umožňuje existenci více learning timescales.


## 10.38 Krátkodobá plastická stopa

Některé změny mohou rychle zaniknout:

```
Δw_fast(t).
```

Mohou dočasně ovlivnit:

```
current percept,
recent context,
transition probability.
```

To poskytuje další mechanismus mezi čistou aktivitou a dlouhodobou
pamětí.


## 10.39 Dlouhodobé učení

Opakovaně potvrzené vztahy mohou přecházet do:

```
Δw_slow.
```

Tím se zkušenost postupně stává součástí dlouhodobé geometrie
Perceptual Manifold.


## 10.40 Konsolidace mezi časovými škálami

Možná architektura:

```
fast state
    ->
repeated replay
    ->
slow synaptic consolidation.
```

Takový mechanismus by umožnil:

```
experience now
```

postupně převést na:

```
persistent future bias.
```


## 10.41 Deep State Learning není backpropagation requirement

DPSH nevyžaduje, aby se síť učila pomocí globálního backpropagation.

Naopak hlavní hypotéza předpokládá, že relevantní dynamické struktury
mohou vznikat prostřednictvím:

```
local plasticity,
local timing,
local error modulation,
recurrent interaction.
```

To je experimentální předpoklad, nikoli dogma.

Pokud lokální mechanismy nebudou postačovat, bude nutné hypotézu
revidovat.


## 10.42 Controller versus lokální učení

Cognia může obsahovat controller.

Je však důležité oddělit:

```
controller decides what to learn
```

od:

```
controller computes global desired weights.
```

První možnost je kompatibilní s DPSH.

Controller může modulovat:

```
learning on/off,
attention,
relevance,
plasticity gain.
```

Samotná synaptická změna však může zůstat lokální.


## 10.43 Interní relevance

Ne všechny zkušenosti musí mít stejnou learning strength.

Systém může generovat interní hodnotu:

```
relevance.
```

Ta může být funkcí:

```
surprise,
reward,
threat,
novelty,
prediction error.
```

Pak:

```
learning_rate =
    F(relevance).
```


## 10.44 Učení bez vědomého přístupu

Pokud lokální dynamika může měnit synapse před vstupem do Global
Workspace, může probíhat:

```
implicit learning.
```

Systém se tedy může učit strukturu prostředí, aniž je celý learning
proces globálně dostupný.


## 10.45 Vědomé učení jako modulovaný režim

Global Workspace může naopak umožnit:

```
top-down attention,
deliberate replay,
explicit strategy.
```

To může zesílit nebo směrovat Deep State Learning.

Vznikají tedy minimálně dvě úrovně:

```
implicit state-space learning
```

a:

```
globally modulated learning.
```


## 10.46 Co přesně se má v Cognia měřit

Nestačí sledovat:

```
final accuracy.
```

Pro Deep State Learning je nutné zaznamenávat:

```
weight distributions,
delay distributions,
phase relationships,
metastable state count,
state lifetime,
transition matrices,
basin geometry,
spontaneous/evoked similarity,
prediction accuracy,
generalization,
representational drift.
```


## 10.47 Experiment D1 – state-space before/after learning

Změříme:

```
Ω_before.
```

Síť vystavíme strukturovanému prostředí.

Poté změříme:

```
Ω_after.
```

Porovnáme:

```
cluster structure,
trajectories,
transition probabilities,
state stability.
```

Pokud učení probíhá na úrovni dynamiky, změna musí být pozorovatelná.


## 10.48 Experiment D2 – sequence learning

Síť trénujeme na:

```
A -> B -> C.
```

Poté testujeme:

```
A.
```

Měříme, zda dynamika spontánně směřuje:

```
M_A -> M_B -> M_C.
```

Kontrolní sekvence:

```
A -> C -> B
```

by měla mít nižší pravděpodobnost, pokud nebyla naučena.


## 10.49 Experiment D3 – timing-dependent learning

Použijeme stejné události, ale různé pořadí:

```
A -> B
```

versus:

```
B -> A.
```

Po učení porovnáme:

```
connectivity,
transitions,
future prediction.
```

Tím testujeme, zda se nekomutativní zkušenost zapisuje do dynamiky.


## 10.50 Experiment D4 – phase-dependent learning

Stejnou sekvenci prezentujeme při:

```
phase structured
```

a:

```
phase scrambled.
```

Měříme:

```
learning speed,
state stability,
transition geometry.
```

Pokud fáze organizuje učení, rozdíl musí být měřitelný.


## 10.51 Experiment D5 – learning with plasticity OFF

Kontrolní síť:

```
plasticity OFF.
```

Porovnáme ji s:

```
plasticity ON.
```

Pokud se manifold nemění, learning hypothesis selhává.


## 10.52 Experiment D6 – STDP versus rate-based plasticity

Porovnáme:

```
STDP
```

a:

```
matched rate-based Hebbian learning.
```

Měříme nejen task performance, ale hlavně:

```
temporal structure,
transition directionality,
phase sensitivity,
metastability.
```

Tím zjistíme, zda timing-sensitive plasticity přidává něco specifického.


## 10.53 Experiment D7 – spontaneous replay

Po učení:

```
external input = 0.
```

Sledujeme, zda síť spontánně navštěvuje:

```
learned states.
```

Porovnáme:

```
spontaneous before learning
spontaneous after learning.
```

Měříme:

```
spontaneous/evoked similarity.
```


## 10.54 Experiment D8 – plasticity during replay

Vytvoříme dvě sítě:

### A

```
spontaneous activity ON
plasticity ON.
```

### B

```
spontaneous activity ON
plasticity OFF.
```

Po blank period testujeme:

```
memory,
prediction,
generalization,
state geometry.
```

To je klíčový test ongoing learning.


## 10.55 Experiment D9 – silent control

Třetí varianta:

### C

```
spontaneous activity OFF
plasticity OFF.
```

Porovnání:

```
A vs B vs C
```

umožní oddělit:

```
effect of spontaneous dynamics
```

od:

```
effect of learning during spontaneous dynamics.
```


## 10.56 Experiment D10 – held-out generalization

Po spontaneous learning nesmíme testovat pouze známé patterny.

Použijeme:

```
held-out stimuli.
```

Pokud:

```
training performance improves
```

ale:

```
held-out performance decreases,
```

může jít o self-reinforcing memorization místo skutečného zlepšení
interního modelu.


## 10.57 Experiment D11 – self-reinforcement test

Do sítě záměrně vložíme malou chybnou interní asociaci:

```
A -> X_wrong.
```

Poté necháme spontaneous learning.

Sledujeme, zda:

```
wrong association decays,
remains,
amplifies.
```

To je přímý test stability Deep State Learning.


## 10.58 Experiment D12 – external correction

Po zesílení interní chybné asociace prezentujeme opakovaně správnou
sekvenci:

```
A -> B_correct.
```

Měříme, zda prediction error dokáže:

```
weaken wrong dynamics,
restore correct transition.
```

Tím testujeme schopnost systému korigovat vlastní chyby.


## 10.59 Experiment D13 – consolidation gate

Porovnáme:

```
plasticity always ON
```

proti:

```
plasticity active only under consolidation condition.
```

Měříme:

```
stability,
drift,
generalization.
```

To může ukázat, zda ongoing learning potřebuje řízení.


## 10.60 Experiment D14 – learning-rate sweep

Budeme měnit:

```
η.
```

Příliš nízké:

```
no useful adaptation.
```

Příliš vysoké:

```
instability / catastrophic drift.
```

Hledáme oblast:

```
η*.
```


## 10.61 Experiment D15 – stochasticity × plasticity

Testujeme mřížku:

```
σ x η.
```

Hledáme režim, kde:

```
state exploration
    +
stable learning
```

vede k nejlepší generalizaci.

Tím přímo propojujeme stochasticitu s Deep State Learning.


## 10.62 Experiment D16 – oscillator × plasticity

Podobně:

```
phase structure ON/OFF
    x
plasticity ON/OFF.
```

Měříme:

```
learned temporal geometry.
```

Pokud phase organization skutečně strukturuje learning, interakční efekt
musí být měřitelný.


## 10.63 Experiment D17 – delay learning

Pokud Cognia umožní adaptivní delays, sledujeme:

```
d_ij before
d_ij after.
```

Testujeme, zda se síť učí časově kompatibilní cesty.

Pokud delays nejsou učitelné, lze alespoň testovat selekci vah podle
fixních delays.


## 10.64 Experiment D18 – basin deformation

Pro vybraný percept:

```
M_A
```

zmapujeme:

```
basin before learning.
```

Po učení:

```
basin after learning.
```

Měříme:

```
basin volume,
perturbation robustness,
entry probability.
```

Tím přímo testujeme metaforu "učení jako deformace krajiny".


## 10.65 Experiment D19 – hysteresis after learning

Změříme:

```
H_before
```

a:

```
H_after.
```

Pokud učení stabilizovalo konkrétní percept, může růst:

```
hysteresis width.
```

To propojuje Deep State Learning s kontinuitou.


## 10.66 Experiment D20 – dynamic routing after learning

Měříme effective connectivity:

```
C_ij(t)
```

před učením a po něm.

Pokud se naučily fázové vztahy, mohou vzniknout nové preferované
komunikační cesty bez změny hrubé anatomické topologie.


## 10.67 Metrika změny manifold

Definujeme například:

```
D_manifold =
    D(
        P_before,
        P_after
    ).
```

Musí zahrnovat více než jeden parametr.

Například:

```
state centroids,
transition matrix,
dwell times,
phase geometry.
```


## 10.68 Metrika spontaneous/evoked similarity

Pro naučený percept:

```
M_A
```

porovnáme:

```
evoked trajectory
```

a:

```
spontaneous trajectory.
```

Definujeme:

```
R_replay =
    similarity(
        T_spontaneous,
        T_evoked
    ).
```

Vyšší hodnota po učení podporuje reaktivaci naučené dynamiky.


## 10.69 Metrika generalizace

Nejdůležitější ochrana proti self-reinforcement:

```
G =
    performance(held-out data).
```

Deep State Learning je užitečný pouze tehdy, pokud nezvyšuje jen
interní confidence, ale zachovává nebo zlepšuje schopnost reagovat na
novou zkušenost.


## 10.70 Metrika representational drift

Během spontaneous learning sledujeme:

```
D(
    M_A(t0),
    M_A(t1)
).
```

Pomalá adaptivní změna může být užitečná.

Nekontrolovaný drift:

```
D -> large
```

může znamenat rozpad reprezentace.


## 10.71 Stability-plasticity dilemma

Systém musí řešit konflikt:

```
plastic enough to learn
```

versus:

```
stable enough to remember.
```

DPSH očekává, že metastabilní dynamika, více learning timescales a
lokální modulace plasticity mohou poskytovat mechanismy tohoto kompromisu.

To však musí být experimentálně ověřeno.


## 10.72 Co by bylo nejsilnějším výsledkem

Velmi silný výsledek by byl:

1. externí zkušenost vytvoří rozlišitelné metastabilní stavy,
2. po odstranění vstupu síť tyto stavy spontánně navštěvuje,
3. plasticita během spontánní aktivity mění jejich geometrii,
4. tato změna zlepšuje prediction nebo generalization na held-out datech,
5. efekt zmizí při vypnutí stochasticity, timing-sensitive plasticity
   nebo relevantní phase organization.

Takový výsledek by byl mnohem silnější než prosté:

```
network remembers stimulus.
```


## 10.73 Falsifikační kritéria

Deep State Learning hypotéza bude oslabena, pokud:

1. spontaneous activity pouze reprodukuje naučené patterny bez dalšího
   funkčního efektu,
2. plasticita během spontaneous activity nezlepšuje žádnou relevantní
   vlastnost,
3. ongoing learning zhoršuje generalizaci,
4. interní replay systematicky zesiluje vlastní chyby,
5. state-space geometry se po učení nemění,
6. jednoduché rate-based learning poskytuje stejné výsledky,
7. timing, phase a delays nejsou pro learning relevantní,
8. všechny potřebné vlastnosti lze vysvětlit explicitní pamětí a
   supervised mappingem bez dynamického state-space learningu.


## 10.74 Deep State Learning jako samostatně falsifikovatelná část

DPSH nemusí padnout celá, pokud Deep State Learning selže.

Je možné, že:

```
dynamic perceptual states exist
```

ale:

```
spontaneous ongoing learning is not beneficial.
```

Proto musí být tato hypotéza testována samostatně.


## 10.75 Vztah k fenomenálnímu prožitku

Ani úspěšné Deep State Learning neprokazuje vznik qualia.

Ukazovalo by však důležitou vlastnost:

> interní stav není pouze pasivní pracovní paměť, ale aktivní dynamická
> struktura, která sama ovlivňuje vlastní budoucí organizaci.

To by posílilo funkční model kontinuální interní zkušenosti.

Fenomenální interpretace však zůstává samostatnou hypotézou.


## 10.76 Požadavky na Cognia

Pro testování Deep State Learning musí Cognia umožnit minimálně:

1. lokální timing-sensitive plasticitu,
2. modulaci plasticity lokálními signály,
3. samostatné zapnutí/vypnutí plasticity,
4. spontaneous activity bez externího vstupu,
5. replay se zapnutou a vypnutou plasticitou,
6. více časových škál plasticity,
7. záznam historie synaptických změn,
8. záznam phase při learning events,
9. synaptická zpoždění,
10. experimentální variantu rate-based plasticity,
11. freeze a restore network state,
12. přesné porovnání manifold před a po učení,
13. held-out testy,
14. možnost měřit representational drift,
15. možnost řídit learning gate externím nebo interním modulátorem.


## 10.77 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H9:

> **H9 – Deep State Learning Hypothesis**
>
> Učení v dynamické rekurentní spikingové síti nemusí spočívat pouze v
> mapování senzorických vstupů na výstupy. Prostřednictvím lokální
> timing-sensitive plasticity může zkušenost měnit geometrii interního
> stavového prostoru, stabilitu metastabilních perceptuálních stavů a
> pravděpodobnosti přechodů mezi nimi. Spontánní ongoing aktivita může
> tyto naučené struktury reaktivovat a za určitých podmínek umožnit jejich
> další konsolidaci nebo reorganizaci i bez nového externího vstupu.

Silnější falsifikovatelná predikce zní:

> Pokud Deep State Learning skutečně existuje jako funkčně významný
> mechanismus, musí plasticita během interně generované spontánní
> dynamiky způsobit měřitelnou změnu Perceptual Manifold, která zlepší
> alespoň některé vlastnosti predikce, robustness nebo generalizace na
> nových datech oproti identické síti se spontánní aktivitou, ale
> vypnutou plasticitou.

Hypotéza tedy netvrdí:

```
spontaneous activity automatically improves learning.
```

Tvrdí:

```
spontaneous structured dynamics
    +
appropriately constrained local plasticity
    ->
possible continued learning of internal state geometry.
```

Klíčovou otázkou není pouze:

```
"Dokáže se síť něco naučit?"
```

Ale:

> **Dokáže se síť naučit vlastní dynamický prostor tak, aby její interní
> stavy lépe odpovídaly struktuře světa, a dokáže tuto strukturu dále
> konsolidovat prostřednictvím vlastní interní aktivity?**
