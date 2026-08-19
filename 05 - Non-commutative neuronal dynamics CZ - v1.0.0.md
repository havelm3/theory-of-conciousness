# 5. Nekomutativní neuronální dynamika

## 5.1 Proč záleží na pořadí

Jedním z hlavních důsledků globálně netaktované, stavové a časově
strukturované neuronální dynamiky je skutečnost, že pořadí událostí může
měnit výsledný stav systému.

Pokud máme dvě události nebo dvě transformace:

```
A
B
```

pak obecně nemusí platit:

```
A(B(S)) = B(A(S)).
```

Naopak očekáváme:

```
A(B(S)) != B(A(S)).
```

Taková dynamika je nekomutativní.

To znamená, že neuronální systém nelze úplně popsat pouze množinou
událostí, které nastaly.

Je nutné znát také:

```
jejich pořadí,
relativní timing,
stav systému v okamžiku jejich příchodu,
fázi lokálních oscilací,
synaptickou historii,
aktuální plasticitu.
```

Historie tedy není pouze záznamem minulosti.

Je aktivní součástí současného stavu systému.


## 5.2 Komutativní a nekomutativní transformace

Uvažujme jednoduchý stav:

```
S0.
```

Na něj působí dvě události:

```
A
B.
```

V komutativním systému:

```
S_AB = B(A(S0))
```

a:

```
S_BA = A(B(S0))
```

přičemž:

```
S_AB = S_BA.
```

Pořadí událostí nemá význam.

V nekomutativním systému:

```
S_AB != S_BA.
```

Stejná dvojice událostí tedy vytváří dva různé stavy podle toho, která
přišla dříve.

To je důležité pro systémy, které mají reprezentovat časově se vyvíjející
svět.

Sekvence:

```
door opens
person enters
```

není ekvivalentní sekvenci:

```
person enters
door opens.
```

Obsahuje jinou kauzální strukturu.


## 5.3 Nekomutativita jako důsledek vnitřního stavu

Pokud je reakce neuronu funkcí jeho aktuálního stavu:

```
response = F(input, state),
```

pak první událost změní stav, na který působí druhá.

Tedy:

```
S1 = F_A(S0)
```

a potom:

```
S2 = F_B(S1).
```

Při opačném pořadí:

```
S1' = F_B(S0)
```

a:

```
S2' = F_A(S1').
```

Proto obecně:

```
S2 != S2'.
```

Nekomutativita tedy nemusí být speciálně implementovaná vlastnost.

Vzniká přirozeně v každém systému, ve kterém:

```
aktuální stav závisí na minulosti
a
události tento stav mění.
```


## 5.4 Refractory period jako jednoduchý příklad

Představme si neuron s refractory period.

Spike `A` dorazí v čase:

```
t0
```

a aktivuje neuron.

Krátce poté dorazí spike `B`:

```
t0 + dt.
```

Pokud je neuron stále refractory:

```
B -> weak/no response.
```

Při opačném pořadí:

```
B first
A second
```

může být potlačen `A`.

Takže:

```
response(A -> B)
    !=
response(B -> A).
```

Pořadí vstupů mění jejich funkční efekt.


## 5.5 Synaptická integrace

Dalším zdrojem nekomutativity je časová integrace.

Neuron může integrovat vstupy v určitém okně:

```
τ.
```

Dva spiky:

```
A at t1
B at t2
```

mohou společně překročit threshold.

Pokud je však jeden z nich inhibitorní:

```
A = excitation
B = inhibition,
```

pak:

```
excitation -> inhibition
```

nemusí mít stejný efekt jako:

```
inhibition -> excitation.
```

První sekvence může vyvolat spike ještě před příchodem inhibice.

Druhá může zabránit jeho vzniku.

Výsledná síťová trajektorie se potom může zásadně rozcházet.


## 5.6 Oscilační fáze a pořadí

V předchozí kapitole jsme ukázali, že účinek spikeu může záviset na
lokální fázi.

Pak dvě stejné události:

```
A
B
```

mohou působit v odlišných fázích:

```
A at φ1
B at φ2.
```

Při opačném pořadí:

```
B at φ1
A at φ2.
```

To nemusí být ekvivalentní.

Obecně:

```
effect(A, φ1) + effect(B, φ2)
    !=
effect(B, φ1) + effect(A, φ2).
```

Oscilační struktura tedy může výrazně zesílit nekomutativní charakter
sítě.


## 5.7 STDP jako explicitní nekomutativní mechanismus

Spike-timing-dependent plasticity poskytuje velmi přímý příklad.

Pokud presynaptický neuron spikuje před postsynaptickým:

```
pre -> post
```

může dojít k jiné synaptické změně než při:

```
post -> pre.
```

Formálně:

```
Δw(pre, post)
    !=
Δw(post, pre).
```

Tím pořadí událostí nemění pouze okamžitou aktivitu.

Mění také budoucí strukturu sítě.

Dostáváme dva stupně nekomutativity:

```
order
    ->
different current state
```

a zároveň:

```
order
    ->
different future dynamics.
```


## 5.8 Nekomutativita a učení

Pokud sekvence událostí mění váhy:

```
A -> B
    ->
W_AB
```

zatímco:

```
B -> A
    ->
W_BA,
```

a:

```
W_AB != W_BA,
```

pak zkušenost mění geometrii budoucího stavového prostoru podle
kauzální historie.

Síť se tedy neučí pouze:

```
co se vyskytlo,
```

ale také:

```
v jakém pořadí se to vyskytlo.
```

To je zásadní pro:

```
sekvence,
kauzalitu,
predikci,
motorické programy,
jazyk,
prostorově-časové vztahy.
```


## 5.9 Nekomutativita a predictive processing

Predictive processing přirozeně pracuje s časovou strukturou.

Pokud systém očekává:

```
A -> B,
```

pak sekvence:

```
A -> B
```

může být dobře predikovatelná.

Sekvence:

```
B -> A
```

může vytvořit prediction error.

To znamená, že interní model nemusí reprezentovat pouze pravděpodobnost
jednotlivých událostí:

```
P(A),
P(B),
```

ale také podmíněné vztahy:

```
P(B | A)
```

a:

```
P(A | B).
```

Obecně:

```
P(B | A) != P(A | B).
```

Časová asymetrie se tak stává součástí interního modelu světa.


## 5.10 Kauzalita

Nekomutativita je úzce spojena s kauzalitou.

Pokud:

```
A causes B,
```

pak sekvence:

```
A -> B
```

má jiný význam než:

```
B -> A.
```

DPSH předpokládá, že vnitřní perceptuální stav musí být citlivý nejen na
současné korelace, ale i na směrovost interakcí.

Interní reprezentace světa proto nemusí být pouze prostorová.

Musí být také kauzálně-časová.


## 5.11 State-space trajektorie

V komutativním systému může být výsledný stav převážně funkcí množiny
vstupů:

```
S_final = F({A, B, C}).
```

V nekomutativním systému je vhodnější:

```
S_final = F(A -> B -> C).
```

Sekvence:

```
A -> B -> C
```

vede po trajektorii:

```
S0 -> S1 -> S2 -> S3.
```

Sekvence:

```
C -> B -> A
```

může vést:

```
S0 -> S1' -> S2' -> S3'.
```

DPSH proto považuje trajektorii stavovým prostorem za důležitější než
samotný konečný bod.


## 5.12 Path dependence

Nekomutativita vede k obecnější vlastnosti:

```
path dependence.
```

Stejný konečný senzorický vstup může být dosažen různými cestami:

```
path A
    ->
input X
```

a:

```
path B
    ->
input X.
```

Pokud systém udržuje historii:

```
S_A != S_B,
```

pak:

```
F(S_A, X)
    !=
F(S_B, X).
```

Tím vzniká mechanismus, kterým předchozí zkušenost ovlivňuje současnou
percepci.


## 5.13 Nekomutativita a hystereze

Hystereze může být chápána jako makroskopický důsledek path dependence.

Při změně:

```
A -> B
```

může systém zůstat ve stavu `M_A` až do určitého threshold.

Při opačném směru:

```
B -> A
```

může být threshold jiný.

Tedy:

```
threshold(A -> B)
    !=
threshold(B -> A).
```

To ukazuje, že současný stav nelze určit pouze z aktuální hodnoty vstupu.

Záleží i na cestě, kterou systém prošel.


## 5.14 Nekomutativita a percept

Pokud percept odpovídá metastabilnímu dynamickému stavu:

```
M,
```

pak cesta, kterou síť do `M` vstoupila, může ovlivnit jeho jemnou
vnitřní strukturu.

Můžeme tedy mít:

```
M_A^path1
```

a:

```
M_A^path2
```

které odpovídají podobnému makroskopickému perceptu, ale liší se v:

```
phase relations,
synaptic state,
local activation,
transition probabilities.
```

To nabízí důležitou možnost:

> Dva subjektivně podobné percepty nemusí být mikroskopicky identické.

Jejich identita může existovat na vyšší úrovni dynamické organizace.


## 5.15 Pořadí jako informace

V takovém systému se samotné pořadí stává nositelem informace.

Například:

```
A -> B -> C
```

může reprezentovat jiný význam než:

```
A -> C -> B.
```

Přestože množina událostí je stejná:

```
{A, B, C}.
```

To je důležité pro jazyk.

Sekvence slov:

```
pes kouše člověka
```

není ekvivalentní:

```
člověka kouše pes
```

ani v případě, že byly aktivovány velmi podobné konceptuální reprezentace.

Stejný princip platí pro:

```
motoriku,
hudbu,
prostorové děje,
sociální interakce,
kauzální inference.
```


## 5.16 Nekomutativita a časové kódování

Pokud informace závisí na pořadí, nelze ji plně zachytit pouze průměrným
firing rate.

Dvě sekvence mohou mít:

```
same neurons,
same spike count,
same average firing rate,
```

ale rozdílné pořadí:

```
A -> B -> C
```

versus:

```
C -> B -> A.
```

DPSH předpokládá, že takové sekvence mohou vytvářet odlišné interní
stavy.

To poskytuje velmi silný experimentální design, protože lze zachovat
statistickou aktivitu a manipulovat pouze timingem.


## 5.17 Nekomutativita a symmetry breaking

Představme si ambivalentní stav:

```
M_A ~ M_B.
```

Malá událost `X` může posunout systém směrem k `M_A`.

Následná událost `Y` potom působí na již změněný stav.

Sekvence:

```
X -> Y
```

může tedy stabilizovat `M_A`.

Opačně:

```
Y -> X
```

může stabilizovat `M_B`.

Pořadí lokálních fluktuací tak může rozhodnout, která globální
interpretace bude nakonec realizována.

Nekomutativita může proto fungovat jako jeden z mikroskopických
mechanismů spontánního narušení symetrie.


## 5.18 Nekomutativita a metastabilita

Metastabilní stav má konečnou životnost.

Pravděpodobnost jeho opuštění může záviset na sekvenci příchozích
událostí:

```
P(M_A -> M_B | X -> Y)
    !=
P(M_A -> M_B | Y -> X).
```

To znamená, že transition graph systému není pouze funkcí množiny
stimulačních událostí.

Je funkcí časově uspořádaných sekvencí.


## 5.19 Kompozice transformací

Pro formální popis lze jednotlivým událostem nebo modulům přiřadit
transformace:

```
T_A
T_B
T_C.
```

Vývoj systému:

```
S' = T_C T_B T_A S.
```

Pokud transformace nekomutují:

```
[T_A, T_B] != 0,
```

kde komutátor definujeme:

```
[T_A, T_B] =
    T_A T_B - T_B T_A,
```

pak pořadí jejich aplikace mění stav.

Tento zápis je užitečný jako matematická inspirace.

DPSH tím netvrdí, že neuronální systém je kvantový systém.

Nekomutativita zde vzniká z klasické nelineární, stavové a
history-dependent dynamiky.


## 5.20 Proč není potřeba kvantová hypotéza

Podobnost s nekomutativními operátory v kvantové mechanice může být
intuitivně zajímavá.

Není však nutné předpokládat:

```
quantum brain
```

ani:

```
quantum computation.
```

Klasický dynamický systém s:

```
nonlinearity,
memory,
delays,
adaptation,
recurrence
```

může být silně nekomutativní.

DPSH používá nekomutativitu jako obecný matematický princip:

> Výsledek sekvence transformací závisí na jejich pořadí.

Tím se vyhýbá nepodloženému přenosu kvantových mechanismů do
neuronální dynamiky.


## 5.21 Nekomutativita a interní zkušenost

Pokud současný stav závisí na celé trajektorii:

```
S(t) = F(history),
```

pak zkušenost systému není pouze archivem minulých dat.

Minulost je fyzicky zakódována v současném:

```
synaptic state,
membrane state,
phase state,
adaptation,
network trajectory.
```

To vede k důležitému principu:

```
history
    ->
current state
    ->
interpretation of future input.
```

Vnitřní zkušenost tedy může být chápána jako stavová stopa předchozí
interakce systému se světem.


## 5.22 Nekomutativita a intuice

Tento princip může později souviset také s intuitivním rozhodováním.

Síť může během dlouhé zkušenosti projít velkým množstvím trajektorií:

```
experience
    ->
plasticity
    ->
learned state-space geometry.
```

Nový vstup potom může systém velmi rychle přesunout do oblasti:

```
M_A
```

bez potřeby explicitně rekonstruovat všechny předchozí kauzální kroky.

Rozhodnutí:

```
action_A
```

tak může být výsledkem celé naučené dynamiky, přestože systém nemá
globálně dostupnou explicitní reprezentaci:

```
"proč jsem zvolil A".
```

V tomto smyslu může být intuitivní rozhodování makroskopickým důsledkem
historicky utvářené nekomutativní dynamiky.


## 5.23 Nekomutativita a Perceptual Manifold

Pokud jsou přechody nekomutativní, Perceptual Manifold nelze chápat
pouze jako množinu bodů.

Je třeba zahrnout:

```
states
+
directed transitions
+
transition histories.
```

Formálně může být vhodnější:

```
M = (S, E)
```

kde:

```
S = set of perceptual states
```

a:

```
E = directed transitions.
```

Přechod:

```
M_A -> M_B
```

nemusí být ekvivalentní:

```
M_B -> M_A.
```

Perceptual Manifold tedy získává směrovou strukturu.


## 5.24 Časová geometrie

Pokud různé cesty mezi stavy mají různé důsledky, pak vzdálenost mezi
dvěma stavy nemusí být symetrická v čistě funkčním smyslu.

Například:

```
cost(M_A -> M_B)
    !=
cost(M_B -> M_A).
```

Stejně tak:

```
transition_probability(M_A -> M_B)
    !=
transition_probability(M_B -> M_A).
```

Perceptual Manifold proto může mít nejen geometrii stavů, ale i
dynamickou orientaci.


## 5.25 Experiment N1 – order reversal

Základní experiment použije dvě události:

```
A
B.
```

Porovnáme:

```
A -> B
```

a:

```
B -> A.
```

Kontrolujeme:

```
same inputs,
same duration,
same number of events,
same approximate firing rate,
same initial state distribution.
```

Měříme:

```
D(S_AB, S_BA),
trajectory divergence,
state separability,
later behavioral effect.
```

Pokud:

```
D(S_AB, S_BA) ~ 0
```

pro všechny relevantní podmínky, silná verze hypotézy order dependence
bude oslabena.


## 5.26 Experiment N2 – timing continuum

Pořadí zůstane:

```
A -> B,
```

ale budeme měnit:

```
Δt = t_B - t_A.
```

Například:

```
-50 ms
-20 ms
-10 ms
-5 ms
0 ms
5 ms
10 ms
20 ms
50 ms.
```

Tím získáme funkci:

```
Q(Δt).
```

Pokud timing skutečně ovlivňuje dynamický stav, měla by existovat
strukturovaná závislost na `Δt`.


## 5.27 Experiment N3 – matched-rate sequence test

Vytvoříme dvě sekvence:

```
sequence 1:
    A -> B -> C

sequence 2:
    C -> B -> A.
```

Zajistíme co nejpodobnější:

```
neuron participation,
spike count,
mean firing rates,
stimulus energy.
```

Manipulujeme pouze:

```
temporal order.
```

Pokud dekodér dokáže spolehlivě rozlišit výsledné interní stavy i po
ukončení sekvence, máme evidence pro order-dependent representation.


## 5.28 Experiment N4 – order-dependent perception

Použijeme:

```
A -> B -> ambiguous X
```

a:

```
B -> A -> ambiguous X.
```

Samotný `X` je identický.

Pokud:

```
P(Y_A | A -> B -> X)
    !=
P(Y_A | B -> A -> X),
```

pak časová historie mění následnou interpretaci stejného stimulu.

To propojuje nekomutativitu přímo s perceptuální funkcí.


## 5.29 Experiment N5 – order-dependent learning

Síť budeme učit dvěma režimy:

```
training 1:
    A -> B

training 2:
    B -> A.
```

Po učení porovnáme:

```
W_AB
```

a:

```
W_BA,
```

ale také:

```
spontaneous dynamics,
metastable state geometry,
response to incomplete inputs.
```

Tím zjistíme, zda pořadí zkušeností mění nejen lokální synapse, ale
globální stavový prostor.


## 5.30 Experiment N6 – commutative control

Je důležité vytvořit kontrolní model, který bude záměrně více
komutativní.

Například:

```
aggregate all spikes in window
    ->
calculate rate
    ->
update state.
```

Takový model může zachovat:

```
spike count,
average activity,
input identity,
```

ale odstranit část timing information.

Porovnání s event-driven DPSH sítí ukáže, zda nekomutativní temporal
structure poskytuje funkční výhodu.


## 5.31 Měření míry nekomutativity

Pro dvě transformace můžeme definovat jednoduchou empirickou míru:

```
C(A,B,S) =
    D(
        T_B(T_A(S)),
        T_A(T_B(S))
    ).
```

Pokud:

```
C ~ 0,
```

jsou transformace v daném stavu přibližně komutativní.

Pokud:

```
C >> 0,
```

pořadí má výrazný efekt.

Důležité je, že:

```
C
```

může záviset na samotném stavu:

```
C = C(A,B,S).
```

Síť tedy nemusí být globálně nekomutativní stejnou měrou.

Nekomutativita může být lokální vlastností některých oblastí
stavového prostoru.


## 5.32 Nekomutativita jako experimentální proměnná

To umožňuje vytvořit mapu:

```
state-space region
    ->
degree of noncommutativity.
```

Může se například ukázat, že:

```
stable trivial states
    ->
low C
```

zatímco:

```
metastable perceptual regions
    ->
high C.
```

Pokud by takový vztah existoval, bylo by to velmi zajímavé.

Znamenalo by to, že bohatá perceptuální dynamika je spojena s vyšší
citlivostí na pořadí událostí.


## 5.33 Falsifikační kritéria

Silná hypotéza nekomutativní perceptuální dynamiky bude oslabena, pokud:

1. obrácení pořadí událostí při zachování ostatních statistik nemění
   interní stav,
2. změna `Δt` nemá systematický efekt,
3. history-dependent rozdíly lze plně vysvětlit pouze jednoduchou
   explicitní paměťovou proměnnou,
4. timing-sensitive plasticity neposkytuje jiný výsledek než
   rate-based learning,
5. ambivalentní percept není ovlivněn předchozí sekvencí,
6. Perceptual Manifold je stejně dobře popsán neorientovanou,
   history-independent reprezentací.

V takovém případě by nekomutativita nebyla centrálním mechanismem DPSH,
ale pouze lokální vlastností některých neuronálních procesů.


## 5.34 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H4:

> **H4 – Non-Commutative Neural Dynamics Hypothesis**
>
> V globálně netaktované stavové neuronální síti je relativní pořadí a
> časování událostí funkčně významnou součástí výpočtu. Proto dvě
> sekvence obsahující stejné lokální události mohou vést k odlišným
> neuronálním trajektoriím, synaptickým změnám a následným
> perceptuálním stavům, pokud se liší jejich kauzální a časové pořadí.

Silnější predikce zní:

> Pokud je nekomutativita důležitou vlastností vzniku perceptuálního
> stavu, pak order reversal a timing perturbation musí měnit následnou
> metastabilní reprezentaci i při zachování identity vstupů, jejich
> počtu a přibližné populační aktivity.

Hypotéza tedy nepředpokládá:

```
noncommutativity = consciousness.
```

Tvrdí:

```
temporal order
    ->
different state trajectory
    ->
different internal representation.
```

Tím se historie systému stává přímo součástí jeho současné
perceptuální dynamiky.
