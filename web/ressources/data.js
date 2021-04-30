const classM = ['Abortiporus biennis', 'Agaricus', 'Agaricus augustus', 'Agaricus bernardi', 'Agaricus bitorquis', 'Agaricus campestris', 'Agaricus hondensis', 'Agaricus xanthodermus', 'Agrocybe', 'Agrocybe pediades', 'Agrocybe praecox', 'Aleuria aurantia', 'Allodus podophylli', 'Amanita aprica', 'Amanita augusta', 'Amanita bisporigera', 'Amanita brunnescens', 'Amanita caesarea', 'Amanita calyptroderma', 'Amanita constricta', 'Amanita echinocephala', 'Amanita farinosa', 'Amanita flavoconia', 'Amanita flavorubens', 'Amanita frostiana', 'Amanita jacksonii', 'Amanita muscaria', 'Amanita novinupta', 'Callistosporium luteo-olivaceum', 'Caloboletus inedulis', 'Calocera cornea', 'Caloplaca', 'Caloscypha fulgens', 'Calvatia cyathiformis', 'Camarops petersii', 'Cantharellula umbonata', 'Cantharellus', 'Cantharellus californicus', 'Cantharellus cinnabarinus', 'Cantharellus formosus', 'Cantharellus lateritius', 'Cantharellus minor', 'Cantharellus subalbidus', 'Caulorhiza umbonata', 'Ceratiomyxa fruticulosa', 'Cerioporus squamosus', 'Cerrena unicolor', 'Chalciporus piperatus', 'Chlorociboria', 'Chlorophyllum brunneum', 'Chlorophyllum molybdites', 'Chlorophyllum olivieri', 'Chromosera cyanophylla', 'Chroogomphus tomentosus', 'Chroogomphus vinicolor', 'Cladonia', 'Clathrus ruber', 'Clavaria fragilis', 'Clavulina coralloides', 'Clavulinopsis fusiformis', 'Climacodon septentrionalis', 'Clitocybe', 'Clitocybe fragrans', 'Clitocybe nuda', 'Clitocybe odora', 'Clitocybe robusta', 'Clitopilus prunulus', 'Coltricia cinnamomea', 'Coltricia perennis', 'Conocybe', 'Conocybe apala', 'Contumyces rosellus', 'Coprinellus', 'Coprinellus disseminatus', 'Coprinellus micaceus', 'Coprinopsis', 'Coprinopsis atramentaria', 'Coprinopsis lagopus', 'Coprinopsis variegata', 'Coprinus comatus', 'Cordyceps militaris', 'Cortinarius', 'Cortinarius caperatus', 'Cortinarius corrugatus', 'Cortinarius glutinosoarmillatus', 'Cortinarius iodes', 'Cortinarius seidliae', 'Cortinarius semisanguineus', 'Cortinarius smithii', 'Cortinarius violaceus', 'Craterellus calicornucopioides', 'Craterellus fallax', 'Craterellus lutescens', 'Craterellus tubaeformis', 'Crepidotus', 'Crepidotus applanatus', 'Crepidotus crocophyllus', 'Crepidotus mollis', 'Crucibulum laeve', 'Cryptoporus volvatus', 'Cuphophyllus pratensis', 'Cuphophyllus virgineus', 'Cyathus striatus', 'Cyclocybe erebia', 'Cystoderma amianthinum', 'Dacrymyces chrysospermus', 'Dacryopinax elegans', 'Daedalea quercina', 'Daedaleopsis confragosa', 'Daldinia', 'Deconica', 'Deconica coprophila', 'Ductifera pululahuana', 'Echinoderma asperum', 'Entoloma', 'Entoloma abortivum', 'Entoloma murrayi', 'Entoloma quadratum', 'Exidia crenata', 'Exidia glandulosa', 'Exidia recisa', 'Fistulina hepatica', 'Flammulina velutipes', 'Flavoparmelia caperata', 'Fomes fomentarius', 'Fomitopsis betulina', 'Fomitopsis mounceae', 'Fomitopsis pinicola', 'Fuligo septica', 'Fuscoporia gilva', 'Galerina', 'Galerina marginata', 'Galiella rufa', 'Ganoderma', 'Ganoderma applanatum', 'Ganoderma curtisii', 'Ganoderma martinicense', 'Ganoderma megaloma', 'Ganoderma oregonense', 'Ganoderma sessile', 'Ganoderma tsugae', 'Geastrum', 'Geastrum saccatum', 'Gerronema strombodes', 'Gliophorus irrigatus', 'Gliophorus laetus', 'Gliophorus psittacinus', 'Gloeophyllum sepiarium', 'Gloeoporus dichrous', 'Gomphidius oregonensis', 'Gomphidius subroseus', 'Gomphus clavatus', 'Grifola frondosa', 'Gymnopilus', 'Gymnopilus junonius', 'Gymnopilus luteus', 'Gymnopilus thiersii', 'Gymnopilus ventricosus', 'Gymnopus', 'Gymnopus dryophilus', 'Gyromitra brunnea', 'Gyromitra esculenta', 'Gyromitra infula', 'Gyromitra korfii', 'Gyroporus castaneus', 'Gyroporus cyanescens', 'Harrya chromapes', 'Hebeloma', 'Hebeloma crustuliniforme', 'Hebeloma mesophaeum', 'Hebeloma velutipes', 'Helvella', 'Helvella acetabulum', 'Helvella crispa', 'Helvella dryophila', 'Helvella vespertina', 'Hemipholiota populnea', 'Hemistropharia albocrenulata', 'Hericium abietis', 'Hericium americanum', 'Hericium coralloides', 'Hericium erinaceus', 'Hohenbuehelia mastrucata', 'Hohenbuehelia petaloides', 'Hydnellum aurantiacum', 'Hydnellum peckii', 'Hygrocybe', 'Hygrocybe acutoconica', 'Hygrocybe cantharellus', 'Hygrocybe conica', 'Hygrocybe flavescens', 'Hygrocybe miniata', 'Hygrocybe singeri', 'Hygrophoropsis aurantiaca', 'Hygrophorus agathosmus', 'Hygrophorus chrysodon', 'Hygrophorus eburneus', 'Hygrophorus flavodiscus', 'Hygrophorus pustulatus', 'Hygrophorus russula', 'Hygrophorus sordidus', 'Hypholoma capnoides', 'Hypholoma fasciculare', 'Hypholoma lateritium', 'Hypholoma marginatum', 'Hypogymnia physodes', 'Hypomyces aurantius', 'Hypomyces chrysospermus', 'Hypomyces hyalinus', 'Hypomyces lactifluorum', 'Hypomyces luteovirens', 'Hypsizygus marmoreus', 'Imleria badia', 'Infundibulicybe gibba', 'Inocybe assimilata', 'Inocybe fuscidula', 'Inocybe griseolilacina', 'Inocybe lilacina', 'Irpex lacteus', 'Ischnoderma resinosum', 'Jahnoporus hirtus', 'Kretzschmaria deusta', 'Kuehneromyces marginellus', 'Laccaria', 'Laccaria amethysteo-occidentalis', 'Laccaria amethystina', 'Laccaria laccata', 'Laccaria ochropurpurea', 'Lacrymaria lacrymabunda', 'Lactarius', 'Lactarius alnicola', 'Lactarius chrysorrheus', 'Lactarius controversus', 'Lactarius croceus', 'Lactarius griseus', 'Lactarius indigo', 'Lactarius rubidus', 'Lactarius rubrilacteus', 'Lactarius subpurpureus', 'Lactarius vinaceorufescens', 'Lactarius xanthogalactus', 'Lactifluus corrugis', 'Lactifluus glaucescens', 'Lactifluus hygrophoroides', 'Lactifluus volemus', 'Laetiporus cincinnatus', 'Laetiporus conifericola', 'Laetiporus gilbertsonii', 'Laetiporus sulphureus', 'Lanmaoa pallidorosea', 'Lanmaoa pseudosensibilis', 'Laricifomes officinalis', 'Lecanora', 'Leccinum', 'Leccinum holopus', 'Leccinum manzanitae', 'Leccinum scabrum', 'Leccinum snellii', 'Lentinellus ursinus', 'Lentinula edodes', 'Lentinus arcularius', 'Lentinus brumalis', 'Lentinus tigrinus', 'Leocarpus fragilis', 'Leotia lubrica', 'Lepiota', 'Lepista nuda', 'Leratiomyces ceres', 'Leratiomyces percevalii', 'Leucoagaricus', 'Leucoagaricus americanus', 'Leucoagaricus leucothites', 'Leucocoprinus', 'Leucocoprinus birnbaumii', 'Leucocoprinus cepistipes', 'Leucopaxillus gentianeus', 'Leucopholiota decorosa', 'Lichenomphalia umbellifera', 'Lobaria pulmonaria', 'Lycogala epidendrum', 'Lycoperdon', 'Lycoperdon perlatum', 'Lycoperdon pyriforme', 'Lyophyllum decastes', 'Macrocystidia cucumis', 'Macrolepiota', 'Macrolepiota procera', 'Marasmiellus candidus', 'Marasmius', 'Marasmius oreades', 'Marasmius plicatulus', 'Marasmius rotula', 'Megacollybia rodmanii', 'Melanoleuca', 'Melanoleuca alboflavida', 'Meripilus sumstinei', 'Morchella', 'Morchella americana', 'Morchella importuna', 'Morchella punctipes', 'Morchella rufobrunnea', 'Morchella snyderi', 'Mycena', 'Mycena acicula', 'Mycena corticola', 'Mycena crocea', 'Mycena haematopus', 'Mycena inclinata', 'Mycena leaiana', 'Mycena leptocephala', 'Mycena pura', 'Mycena purpureofusca', 'Myxarium nucleatum', 'Neoboletus subvelutipes', 'Neofavolus alveolaris', 'Neolentinus lepideus', 'Niveoporofomes spraguei', 'Nolanea holoconiota', 'Omphalotus illudens', 'Omphalotus olivascens', 'Oudemansiella furfuracea', 'Panaeolus', 'Panaeolus antillarum', 'Panaeolus cinctulus', 'Panaeolus cyanescens', 'Panaeolus foenisecii', 'Panaeolus olivaceus', 'Panaeolus papilionaceus', 'Panellus stipticus', 'Panus conchatus', 'Parasola auricoma', 'Parasola conopilea', 'Paxillus involutus', 'Peltigera', 'Peltigera praetextata', 'Peniophorella pubera', 'Pertusaria', 'Peziza', 'Phaeolus schweinitzii', 'Phallus ravenelii', 'Phlebia radiata', 'Phlebia tremellosa', 'Pholiota aurivella', 'Pholiota spumosa', 'Pholiota squarrosoides', 'Pholiota terrestris', 'Pholiotina cyanopus', 'Phylloporus arenicola', 'Phyllotopsis nidulans', 'Physcia adscendens', 'Picipes badius', 'Pisolithus', 'Pisolithus arhizus', 'Pleurocybella porrigens', 'Pleurotus', 'Pleurotus dryinus', 'Pleurotus ostreatus', 'Pleurotus populinus', 'Pleurotus pulmonarius', 'Plicaturopsis crispa', 'Pluteus', 'Pluteus americanus', 'Pluteus cervinus', 'Pluteus exilis', 'Pluteus petasatus', 'Pluteus romellii', 'Polyporus radicatus', 'Polyporus umbellatus', 'Poria', 'Postia guttulata', 'Psathyrella', 'Psathyrella bipellis', 'Psathyrella candolleana', 'Psathyrella delineata', 'Psathyrella piluliformis', 'Pseudoboletus parasiticus', 'Pseudohydnum gelatinosum', 'Pseudoinonotus dryadeus', 'Psilocybe allenii', 'Psilocybe aztecorum', 'Psilocybe azurescens', 'Psilocybe baeocystis', 'Psilocybe caerulescens', 'Psilocybe caerulipes', 'Psilocybe cubensis', 'Psilocybe cyanescens', 'Psilocybe fagicola', 'Psilocybe heimii', 'Psilocybe mexicana', 'Psilocybe muliercula', 'Psilocybe neoxalapensis', 'Psilocybe ovoideocystidiata', 'Psilocybe pelliculosa', 'Psilocybe semilanceata', 'Psilocybe stuntzii', 'Psilocybe subaeruginosa', 'Psilocybe subtropicalis', 'Psilocybe yungensis', 'Psilocybe zapotecorum', 'Pulchroboletus rubricitrinus', 'Pulveroboletus ravenelii', 'Pycnoporellus fulgens', 'Ramaria', 'Retiboletus griseus', 'Retiboletus ornatipes', 'Retiboletus vinaceipes', 'Rhizomarasmius pyrrhocephalus', 'Rhodocollybia butyracea', 'Rhodocollybia maculata', 'Rhodofomes cajanderi', 'Rhodotus palmatus', 'Rickenella fibula', 'Russula', 'Russula aeruginea', 'Russula brevipes', 'Russula compacta', 'Russula cremoricolor', 'Russula crustosa', 'Russula densifolia', 'Russula dissimulans', 'Russula flavisiccans', 'Russula mariae', 'Russula modesta', 'Russula ochroleucoides', 'Russula parvovirescens', 'Russula pectinatoides', 'Russula pulverulenta', 'Russula variata', 'Russula vinacea', 'Russula vinosa', 'Russula xerampelina', 'Sarcodon', 'Sarcomyxa serotina', 'Sarcoscypha austriaca', 'Sarcoscypha occidentalis', 'Sarcosphaera coronaria', 'Schizophyllum commune', 'Scleroderma', 'Scleroderma areolatum', 'Scleroderma citrinum', 'Scutellinia', 'Xylaria', 'Xylobolus frustulatus']
