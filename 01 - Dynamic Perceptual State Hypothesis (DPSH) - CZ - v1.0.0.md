# Hypotéza dynamického perceptuálního stavu
## Dynamic Perceptual State Hypothesis (DPSH)

## 1. Úvod

### 1.1 Problém vzniku vjemu

Současné neuronové modely dokáží s vysokou úspěšností klasifikovat
senzorické vstupy, vytvářet jejich reprezentace, predikovat budoucí
vstupy a generovat odpovídající reakce. Samotná schopnost transformovat
vstupní informaci na výstup však nevysvětluje, jak může v neuronálním
systému vzniknout kontinuální vnitřní stav odpovídající aktuálně
vnímanému světu.

Je proto nutné rozlišovat mezi několika úrovněmi zpracování informace:

1. **detekce** – systém reaguje na určitou vlastnost vstupu,
2. **reprezentace** – systém vytváří interní stav korelující s určitou
   vlastností nebo objektem,
3. **percept** – reprezentace se stává součástí kontinuálního
   integrovaného stavu systému a ovlivňuje jeho další dynamiku,
4. **fenomenální zkušenost** – subjektivní aspekt perceptu, tedy to,
   co je ve filozofii mysli často označováno jako *qualia*.

Tato hypotéza se primárně zabývá třetí úrovní: vznikem a udržováním
perceptu.

Fenomenální zkušenost představuje silnější problém. Hypotéza proto
nepředpokládá, že nalezení mechanismu perceptu automaticky vysvětluje
existenci qualia. Zkoumá však možnost, že dynamický neuronální
mechanismus vytvářející percept může představovat kandidátní fyzikální
substrát, na kterém fenomenální zkušenost závisí.


### 1.2 Od reprezentace k dynamickému stavu

Běžnou neuronovou síť lze zjednodušeně chápat jako transformaci

    X -> F(X) -> Y

kde `X` představuje vstup, `F` neuronální výpočet a `Y` výslednou
reprezentaci nebo výstup.

Pro živý percepční systém však takový popis není dostačující. Organismus
nezačíná zpracování každého nového senzorického vstupu z nulového stavu.
V každém okamžiku již existuje určitý vnitřní stav, který vznikl
předchozí interakcí systému s prostředím.

Vhodnější popis je proto

    S(t + dt) = F(S(t), I(t))

kde:

- `S(t)` je aktuální vnitřní stav systému,
- `I(t)` je senzorický a interní vstup,
- `F` představuje dynamiku neuronálního systému.

Stejný senzorický vstup tedy nemusí vždy vytvořit stejný výsledný stav:

    F(S_A, I) != F(S_B, I)

Percepce je v tomto pojetí proces závislý na historii systému.

Systém nevytváří izolované reprezentace jednotlivých okamžiků.
Kontinuálně transformuje již existující interní model.


### 1.3 Percept jako dynamický proces

Dynamic Perceptual State Hypothesis vychází z předpokladu, že percept
není nutně reprezentován aktivací konkrétního neuronu, neuronální
populace ani statickým vzorem aktivity.

Uvažujme globální stav neuronálního systému

    S(t) = (s1(t), s2(t), ..., sn(t))

kde `si(t)` představuje stav jednotlivých neuronálních nebo jiných
dynamických jednotek.

Percept může odpovídat oblasti `M` stavového prostoru, ve které se
trajektorie systému po určitou dobu pohybuje:

    S(t) in M

Jednotlivé komponenty tohoto stavu se mohou neustále měnit:

    si(t) != si(t + dt)

zatímco globální dynamická struktura zůstává zachována.

Percept tedy nemusí být statický stav.

Může být **metastabilním dynamickým procesem**.

Tento rozdíl je zásadní. Informace nemusí být uchovávána pouze
prostřednictvím neměnné aktivace. Může být uchovávána také strukturou
trajektorie systému v jeho stavovém prostoru.


### 1.4 Kontinuální interní reprezentace světa

Percepční systém musí řešit zásadní problém: senzorické informace jsou
neúplné, opožděné, zatížené šumem a neustále se mění.

Přesto subjektivně nevnímáme svět jako posloupnost nezávislých
senzorických vzorků.

Vnímáme relativně stabilní prostředí.

Objekt například nepřestává být součástí našeho vnímaného světa pouze
proto, že je na krátkou dobu zakryt jiným objektem.

To naznačuje, že percepční systém nepracuje pouze s aktuálními
senzorickými daty, ale udržuje interní stav, vůči kterému jsou nová data
interpretována.

Tento princip je kompatibilní s predictive processing, podle kterého
percepce zahrnuje průběžnou interakci mezi interním modelem a
senzorickou evidencí.

Schematicky:

    internal state
          |
          v
      prediction
          |
          v
    expected input
          |
          | comparison
          v
    sensory input
          |
          v
    prediction error
          |
          v
    modification of internal state

V rámci DPSH však predictive processing nepředstavuje úplné vysvětlení
vzniku perceptu.

Určuje především **omezení dynamiky systému**: senzorická evidence
zvýhodňuje některé možné interní stavy a destabilizuje jiné.

Otázkou zůstává, jakým fyzikálním a neuronálním mechanismem samotný
dynamický interní stav vzniká.


### 1.5 Globální netaktovanost

Jedním z hlavních předpokladů DPSH je, že biologický neuronální systém
nelze plně charakterizovat jako síť aktualizovanou společným globálním
výpočetním krokem.

Jednotlivé neurony jsou autonomní dynamické jednotky.

Přijímají signály v různých okamžicích, mění svůj interní stav a
generují další události bez požadavku, aby všechny ostatní neurony
současně provedly stejný výpočetní krok.

DPSH proto předpokládá **globálně netaktovanou, lokálně kauzální
dynamiku**.

To neznamená absenci časové organizace.

Neuronální systém může obsahovat oscilace a jednotlivé lokální okruhy
mohou být výrazně synchronizované.

Je však nutné rozlišovat mezi:

    global processing clock

a

    endogenous oscillatory signal

Globální clock určuje, **kdy smí být systém aktualizován**.

Endogenní oscilátor je naopak **součástí samotného systému**. Jeho
signál může měnit excitabilitu neuronů, pravděpodobnost spiku,
plasticitu nebo komunikaci mezi populacemi, neurčuje však univerzální
okamžik aktualizace všech neuronů.

Časová struktura výpočtu tak nemusí být systému vnucena zvenčí.
Může vznikat uvnitř jeho vlastní dynamiky.


### 1.6 Stochasticita jako součást výpočtu

Druhým předpokladem hypotézy je, že variabilita neuronální aktivity
nemusí představovat pouze chybu nebo nežádoucí šum.

Neuron může mít nenulovou pravděpodobnost spiku i bez jednoznačného
externího stimulu:

    P(spike | external_input = 0) > 0

Jeho okamžitou pravděpodobnost aktivity lze obecně chápat jako funkci

    P(spike_i, t) =
        F(
            sensory_input,
            internal_state,
            recurrent_input,
            oscillatory_phase,
            synaptic_history,
            stochastic_component
        )

Taková síť zůstává dynamická i v nepřítomnosti bezprostředního
senzorického podnětu.

DPSH zkoumá možnost, že omezená stochasticita umožňuje systému
explorovat blízké oblasti vlastního stavového prostoru.

Rekurentní vazby, lokální oscilace, plasticita a senzorická evidence
potom mohou některé z těchto stavů zesilovat, stabilizovat nebo
destabilizovat.

Stochasticita v tomto pojetí není opakem struktury.

Může být jedním z mechanismů, ze kterých se struktura samoorganizuje.


### 1.7 Čas jako nositel informace

Pokud neurony nejsou aktualizovány společným globálním taktem, stává se
relativní časování událostí potenciálně významnou součástí výpočtu.

Informace potom nemusí být určena pouze tím,

    které neurony spikovaly

nebo

    kolikrát spikovaly,

ale také

    kdy spikovaly
    a vzhledem k jakému lokálnímu dynamickému kontextu.

To vede k důležitému důsledku.

Neuronální transformace mohou být nekomutativní:

    F_B(F_A(S)) != F_A(F_B(S))

Sekvence událostí

    A -> B

tedy nemusí vést ke stejnému internímu stavu jako

    B -> A.

Historie systému se tím stává fyzickou součástí jeho současného stavu.

Spike-timing-dependent plasticity představuje známý příklad mechanismu,
ve kterém relativní pořadí událostí ovlivňuje změnu synaptických vazeb.
DPSH zkoumá širší možnost, že order-dependent dynamika je základní
vlastností samotného vytváření perceptuálních stavů.


### 1.8 Samoorganizace perceptu

Senzorický vstup nemusí jednoznačně určovat jedinou interpretaci.

V určitém okamžiku může dynamika systému připouštět několik konkurenčních
stavů:

    M1, M2, ..., Mn

Senzorická evidence mění jejich stabilitu, ale nemusí sama obsahovat
jednoznačné rozhodnutí, který z nich má být realizován.

DPSH předpokládá, že prostřednictvím rekurence, stochasticity,
excitace, inhibice a časové koordinace může dojít ke spontánnímu
narušení této dynamické symetrie:

    competing possible states
              |
              v
       local fluctuations
              |
              v
     recurrent amplification
              |
              v
       symmetry breaking
              |
              v
    metastable perceptual state

Koherentní percept tedy nemusí být výsledkem centrálního mechanismu,
který jednotlivé senzorické informace explicitně skládá.

Může vzniknout jako makroskopická vlastnost samoorganizujícího se
dynamického systému.


### 1.9 Perceptual Manifold

Pro pracovní popis globálního interního stavu zavádíme pojem
**Perceptual Manifold**.

Perceptual Manifold není míněn jako konkrétní anatomická oblast ani jako
jedna neuronální reprezentace.

Označuje dynamickou strukturu stavového prostoru systému, ve které jsou
současně zakódovány vzájemně závislé informace o aktuálním vnitřním
modelu prostředí a organismu.

Jednotlivé subsystémy mohou z tohoto stavu získávat rozdílné informace:

    Perceptual Manifold
            |
       +----+----+---------+----------+
       |         |         |          |
       v         v         v          v
     action    memory   valuation   language
       |
       v
    environment

Perceptuální stav tedy nemusí být konečným výstupem percepčního systému.

Je současně **vstupem pro další neuronální procesy**.

Tím vzniká uzavřená dynamická smyčka:

    environment
         |
         v
    sensory input
         |
         v
    perceptual dynamics
         |
         v
    internal model
         |
         +----> prediction
         |
         +----> memory
         |
         +----> evaluation
         |
         +----> action
                    |
                    v
               environment

Systém tak průběžně mění svět, ze kterého následně získává další
senzorická data.


### 1.10 Vztah ke Global Workspace Theory

DPSH nerozumí Global Workspace jako mechanismu, který nutně vytváří
samotný percept.

Navrhuje rozlišovat mezi:

    percept formation

a

    global accessibility.

Pracovní architektura je:

    local sensory dynamics
              |
              v
    metastable perceptual state
              |
              v
      workspace selection
              |
              v
       global broadcast
              |
      +-------+-------+
      |       |       |
      v       v       v
    memory  action  cognition

Global Workspace může vysvětlovat, jak se určitý obsah stane globálně
dostupným ostatním procesům.

DPSH se pokouší řešit předcházející otázku:

**Jak může vůbec vzniknout koherentní dynamický obsah, který má být
globálně zpřístupněn?**


### 1.11 Centrální hypotéza

Na základě předchozích předpokladů formulujeme pracovní centrální
hypotézu:

> V globálně netaktovaném rekurentním neuronálním systému mohou
> autonomní stochastické spikingové jednotky prostřednictvím lokálních
> interakcí, endogenní oscilační modulace, relativního časování,
> synaptických zpoždění a lokální plasticity spontánně vytvářet
> metastabilní populační stavy. Senzorická evidence a prediktivní
> mechanismy omezují dynamiku těchto stavů tak, že některé z nich
> vytvářejí persistentní interní reprezentace relevantních vlastností
> prostředí. Tyto dynamické stavy představují kandidátní mechanismus
> vzniku integrovaného perceptu.


### 1.12 Silná fenomenální hypotéza

Nad touto mechanistickou hypotézou lze formulovat silnější hypotézu:

> Metastabilní dynamický perceptuální stav může představovat neuronální
> substrát fenomenálního obsahu zkušenosti.

Tuto hypotézu však nelze odvodit pouze z existence metastabilní
neuronální dynamiky.

Ani úspěšná experimentální demonstrace dynamického perceptuálního stavu
sama o sobě neprokazuje vznik subjektivní zkušenosti nebo qualia.

Proto budou v dalším výzkumu striktně odděleny:

    H1: existence dynamického mechanismu

    H2: schopnost mechanismu vytvářet a udržovat perceptuální obsah

    H3: vztah tohoto mechanismu k fenomenální zkušenosti

H1 a H2 lze přímo testovat prostřednictvím neuronálních simulací a
behaviorálních úloh.

H3 zůstává otevřenou fenomenální hypotézou.


### 1.13 Falsifikovatelnost

Cílem DPSH není vytvořit mechanismus, který lze zpětně přizpůsobit
libovolnému výsledku.

Jednotlivé části hypotézy musí vytvářet měřitelné predikce.

Pokud například:

- odstranění asynchronního zpracování nezmění relevantní dynamiku,
- odstranění spontánní stochasticity nezmění schopnost tvorby
  interních stavů,
- narušení relativní fáze při zachovaném firing rate nezmění
  perceptuální reprezentaci,
- pořadí neuronálních událostí nebude mít očekávaný vliv na stavovou
  trajektorii,
- síť nebude vykazovat metastabilní populační struktury,
- předchozí stav nebude ovlivňovat interpretaci následného vstupu,
- nebo prediktivní zpětná vazba nebude stabilizovat stavy odpovídající
  struktuře prostředí,

budou příslušné části hypotézy oslabeny nebo falsifikovány.

Výzkumným cílem proto není vytvořit systém, který pouze vykazuje
zajímavé chování, ale experimentálně určit, **které z navržených
mechanismů jsou pro vznik dynamického perceptuálního stavu skutečně
kauzálně nezbytné**.