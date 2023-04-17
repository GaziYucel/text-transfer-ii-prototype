function getMessages() {
    return {
        'notReady': 'Nothing to see here, move along!',
        'confirmSave': 'Are you sure you want to save?',
        'cancelled': 'Save cancelled',
        'addField': 'This adds a new field',
        'confirmDelete': 'Are you sure you want to delete this author?'
    };
}

function getTitle() {
    return 'OPTIMETA – Strengthening the Open Access publishing system through open citations and spatiotemporal metadata';
}

function getSubTitle() {
    return 'Korpusgestützte Erkennung von Verwertungsmustern in wissenschaftlichen Texten';
}

function getKeywords() {
    return 'open access publishing, open research information, geospatial metadata, open citations';
}

function getAuthors() {
    return [
        {
            given_name: 'Gazi',
            family_name: 'Yücel',
            email: 'gazi.yuecel@tib.eu',
            institution: 'Leibniz Universität Hannover'
        },
        {
            given_name: 'Simon',
            family_name: 'Worthington',
            email: 'simon.worthington@tib.eu',
            institution: 'Leibniz Universität Hannover'
        }
    ];
}

function getIdentifiers() {
    return '10.3897/RIO.7.E66264';
}

function getFields() {
    return {
        'dc:title': 'Report title',
        'dc:creator': 'The author',
        'dc:subject': 'Subject',
        'dc:description': 'Description',
        'dc:publisher': 'Publisher name',
        'dc:contributor': 'Contributor',
        'dc:date': 'Date',
        'dc:type': 'Type',
        'dc:format': 'Format',
        'dc:identifier': 'Identifier',
        'dc:language': 'Language',
        'dc:relation': 'Relation',
        'dc:rights': 'Rights',
        'dc:references': 'References'
    };
}

function getAuthorSchema() {
    return {
        given_name: '',
        family_name: '',
        email: '',
        institution: ''
    };
}

function getInstitutions() {
    return [
        'Academy of Fine Arts Dresden',
        'Academy of Fine Arts Leipzig',
        'Academy of Media Arts Cologne',
        'Albert-Ludwigs-Universität Freiburg',
        'Albstadt-Sigmaringen University of Applied Sciences',
        'Alfred Wegener Institute, Helmholtz Centre for Polar and Marine Research (AWI)',
        'Anhalt University of Applied Sciences',
        'Anmeldung Fachinformationsdienste (FID VHO)',
        'APOLLON Hochschule Bremen',
        'Art Academy of Duesseldorf',
        'Arthistoricum.net - Fachinformationsdienst Kunst, Fotographie, Design',
        'AUB - IdP',
        'BA Dresden',
        'BA Riesa',
        'Badische Landesbibliothek',
        'Bauhaus-Universität Weimar',
        'Berlin School of Economics and Law (HWR)',
        'Berlin-Brandenburg Academy of Sciences and Humanities (BBAW)',
        'Berliner Hochschule für Technik (BHT)',
        'Berufsakademie Sachsen',
        'bib International College',
        'Bibliotheksservice-Zentrum Baden-Wuerttemberg',
        'Bochum University Of Applied Sciences',
        'Bochum University of Applied Sciences (Library)',
        'Bonn-Rhein-Sieg University of Applied Sciences IDM',
        'Brandenburg Medical School',
        'Brandenburg University of Applied Sciences',
        'Braunschweig University of Art',
        'BSB München',
        'BTU Cottbus - Senftenberg',
        'Bucerius Law School gGmbH',
        'Burg Giebichenstein University of Art and Design Halle',
        'Catholic University Eichstaett-Ingolstadt',
        'Catholic University of Applied Sciences Freiburg',
        'Catholic University of Applied Sciences of North Rhine-Westphalia',
        'Central Institute of Mental Health',
        'Centre for East European and International Studies (ZOiS)',
        'Charite - Universitaetsmedizin Berlin',
        'Christian-Albrechts-Universität zu Kiel',
        'CISPA - Helmholtz Center for Information Security',
        'City University of applied sciences Bremen',
        'College of Music Nuremberg',
        'Commerzbibliothek Hamburg',
        'CrossAsia.org (VHO)',
        'DAAD ID',
        'DARIAH',
        'Deggendorf Institute of Technology',
        'Detmold University of Music',
        'Deutsches Elektronen-Synchrotron DESY',
        'Deutsches Klimarechenzentrum GmbH (DKRZ)',
        'Deutsches Krebsforschungszentrum (DKFZ)',
        'Deutsches Schifffahrtsmuseum (DSM)',
        'DFKI GmbH',
        'DFN Login Extern',
        'DFN Office',
        'DFN-AAI Integration + Test IdP',
        'DFN-CERT Services GmbH',
        'DFNconf Login',
        'DFnconf Zoom SSO',
        'DHBW CAS',
        'DHBW Heidenheim',
        'DHBW Heilbronn',
        'DHBW Karlsruhe',
        'DHBW Lörrach',
        'DHBW Mannheim',
        'DHBW Mosbach',
        'DHBW Praesidium',
        'DHBW Ravensburg',
        'DHBW Stuttgart',
        'DHBW Villingen-Schwenningen',
        'DIfE - German Institute of Human Nutrition',
        'DIPF | Leibniz Institute for Research and Information in Education',
        'DIW Berlin Test Idp',
        'DLR - Deutsches Zentrum fuer Luft- und Raumfahrt e.V.',
        'Dortmund University of Applied Sciences and Arts',
        'DZNE Deutsches Zentrum fur Neurodegenerative Erkrankungen',
        'Eberswalde University for Sustainable Development',
        'Ernst-Abbe-Hochschule Jena',
        'ESMT Berlin',
        'ESO - European Southern Observatory',
        'Esslingen University of Applied Sciences',
        'Europa-Universität Flensburg',
        'Europa-Universität Viadrina',
        'Evangelische Hochschule Berlin',
        'Evangelische Hochschule Darmstadt',
        'Evangelische Hochschule Dresden',
        'Evangelische Hochschule Nuernberg',
        'Fachhochschule Bielefeld',
        'Fachhochschule Potsdam, University of Applied Scienes',
        'Fachhochschule Westküste',
        'Federal Institute for Drugs and Medical Devices',
        'Ferdinand-Braun-Institute, Leibniz-Institut fuer Hoechstfrequenztechnik',
        'FH Erfurt',
        'FH HRZ Darmstadt',
        'FH Muenster',
        'FID-Recht (VHO)',
        'Filmakademie Baden-Wuerttemberg (Prod)',
        'Filmuniversity Babelsberg KONRAD WOLF',
        'FIZ Karlsruhe',
        'Flensburg University of Applied Sciences',
        'Folkwang University of the Arts',
        'Forschungsverbund Marbach Weimar Wolfenbüttel',
        'Forschungszentrum Jülich GmbH (FZJ)',
        'Frankfurt University of Applied Sciences',
        'Fraunhofer-Gesellschaft',
        'Freie Universität Berlin',
        'Friedrich Schiller University Jena',
        'Friedrich-Alexander-Universität Erlangen-Nürnberg (FAU)',
        'Fritz-Haber-Institut',
        'Furtwangen University',
        'FZI Forschungszentrum Informatik',
        'GEOMAR Helmholtz Centre for Ocean Research Kiel',
        'Georg-August University Göttingen',
        'German Institute for Global and Area Studies (GIGA)',
        'German Literature Archive Marbach',
        'German Police University',
        'German Sport University Cologne',
        'Gesellschaft für wissenschaftliche Datenverarbeitung mbH Göttingen',
        'GESIS – Leibniz-Institute for the Social Sciences',
        'GSI Helmholtzzentrum für Schwerionenforschung GmbH',
        'HafenCity Universität Hamburg',
        'Hamburg University of Applied Sciences',
        'Hamburg University of Technology (TUHH)',
        'Hannover Medical School',
        'Hanover University of Music, Drama and Media',
        'HAWK University Hildesheim/Holzminden/Göttingen',
        'Heilbronn University',
        'Heinrich Heine University Duesseldorf',
        'Helmholtz Association of German Research Centres e.V.',
        'Helmholtz Centre for Infection Research GmbH [HZI]',
        'Helmholtz Centre Potsdam GFZ German Research Centre for Geosciences',
        'Helmholtz Zentrum Muenchen GmbH (HMGU)',
        'Helmholtz-Zentrum Berlin für Materialien und Energie GmbH (HZB)',
        'Helmholtz-Zentrum Dresden-Rossendorf e.V. (HZDR)',
        'Helmholtz-Zentrum für Umweltforschung GmbH - UFZ IdP',
        'Helmholtz-Zentrum hereon GmbH',
        'Helmut-Schmidt-Universität Hamburg',
        'Hertie School',
        'Herzog August Bibliothek Wolfenbuettel',
        'HfG Hochschule für Gestaltung Schwäbisch Gmünd',
        'HfG Offenbach - University of Art and Design Offenbach am Main',
        'Hfoed - FB AIV',
        'HfWU Nuertingen-Geislingen',
        'Hochschulbibliothekszentrum NRW (hbz) - Identity Provider (IdP)',
        'Hochschule Aalen - Technik und Wirtschaft',
        'Hochschule Ansbach IDP',
        'Hochschule Biberach',
        'Hochschule Bremerhaven University of Applied Sciences',
        'Hochschule Coburg',
        'Hochschule Darmstadt, University of Applied Sciences',
        'Hochschule der Medien Stuttgart',
        'Hochschule Düsseldorf (Gen 1)',
        'Hochschule fuer Musik Dresden',
        'Hochschule fuer Musik und Theater Hamburg',
        'Hochschule Fulda University of Applied Sciences',
        'Hochschule für Gesundheit',
        'Hochschule für Musik des Saarlandes',
        'Hochschule für Musik und Tanz Köln',
        'Hochschule für Musik und Theater München - HMTM',
        'Hochschule für Musik Weimar',
        'Hochschule für Philosophie München',
        'Hochschule für Technik Stuttgart',
        'Hochschule für Technik und Wirtschaft - HTW Berlin',
        'Hochschule für Technik und Wirtschaft des Saarlandes',
        'Hochschule für Technik, Wirtschaft und Kultur Leipzig',
        'Hochschule Geisenheim University',
        'Hochschule Hamm-Lippstadt',
        'Hochschule Hannover',
        'Hochschule Harz',
        'Hochschule Koblenz',
        'Hochschule Mainz',
        'Hochschule Merseburg - University of Applied Science (Development)',
        'Hochschule Mittweida',
        'Hochschule Niederrhein IdP',
        'Hochschule Osnabrück',
        'Hochschule Pforzheim University IdP',
        'Hochschule RheinMain',
        'Hochschule Ruhr West',
        'Hochschule Schmalkalden',
        'Hochschule Wismar',
        'Hochschule Worms',
        'Hochschule Würzburg-Schweinfurt',
        'Hochschule Zittau/Goerlitz',
        'http://adfs.gwdg.de/adfs/services/trust',
        'HTWG Konstanz',
        'Humboldt-Universität zu Berlin',
        'IDP HFBK Hamburg',
        'IFW Dresden',
        'InIT.mpg.de - Enabling Research',
        'International Psychoanalytic University Berlin (IPU)',
        'IPB Halle',
        'IPK Gatersleben',
        'ISM International School of Management',
        'Jacobs University Bremen gGmbH',
        'Jade Hochschule',
        'Justus Liebig University Giessen',
        'Karlsruhe Institute of Technology (KIT)',
        'Katholische Stiftungshochschule München.',
        'Kempten University of Applied Sciences',
        'Kiel Institute for the world economy',
        'Kiel University of Applied Sciences',
        'Kunstakademie Münster',
        'Leibniz Institut für Naturstoff-Forschung und Infektionsbiologie, Hans-Knöll-Institut',
        'Leibniz Institute for Catalysis - LIKAT',
        'Leibniz Institute for Plasma Science and Technology',
        'Leibniz Institute of Freshwater Ecology and Inland Fisheries (IGB)',
        'Leibniz Supercomputing Centre (LRZ)',
        'Leibniz Universität Hannover',
        'Leibniz-Association - Headquarters',
        'Leibniz-Forschungsinstitut für Molekulare Pharmakologie - FMP (XAAI1 IdP)',
        'Leibniz-Institut fuer Analytische Wissenschaften - ISAS - e.V.',
        'Leibniz-Institut fuer Wissensmedien',
        'Leibniz-Institut für Bildungsmedien',
        'Leibniz-Institut für Deutsche Sprache (IDS)',
        'Leibniz-Institut für Ostseeforschung Warnemünde',
        'Leibniz-Institute of Atmospheric Physics IAP',
        'Leipzig University',
        'Leuphana - University Lueneburg',
        'Link and Learn',
        'Ludwigshafen University of Business and Society',
        'Magdeburg-Stendal University of Applied Sciences',
        'Martin-Luther-University Halle-Wittenberg',
        'Max Born Institute Berlin, IDP1',
        'Max Delbrück Center for Molecular Medicine',
        'Max Planck Computing and Data Facility (MPCDF)',
        'Max Planck Institut fuer Kohlenforschung',
        'Max Planck Institute for Chemical Ecology',
        'Max Planck Institute for Informatics',
        'Max Planck Institute for Marine  Microbiology',
        'Max Planck Institute for Mathematics in the Sciences',
        'Max Planck Institute for Plasma Physics (IPP)',
        'Max Planck Institute for Quantum Optics (MPQ)',
        'Max Planck Institute for Software Systems',
        'Max Planck Society',
        'Max Rubner-Institute',
        'Max-Planck Institutes (in MetaDir of GWDG)',
        'Max-Planck-Institute for Astronomy (MPIA)',
        'Max-Planck-Institute for Chemistry',
        'Meta-Videoportal unterrichtsvideos.net',
        'MfN - Museum fuer Naturkunde - Berlin',
        'Ministry of Education, Science and Culture Mecklenburg-Vorpommern',
        'MPI of Biochemistry',
        'MPI of Biophysics',
        'MSH MSB BSP HMU - IDP',
        'Neubrandenburg University of Applied Sciences',
        'NORDAKADEMIE Elmshorn',
        'Offenburg University of Applied Sciences',
        'Ostbayerische Technische Hochschule Amberg-Weiden',
        'Ostbayerische Technische Hochschule Regensburg',
        'Ostfalia',
        'Otto-von-Guericke-University Magdeburg',
        'Paderborn University',
        'PH Freiburg',
        'PH Ludwigsburg',
        'PH Weingarten',
        'Philipps-Universität Marburg',
        'Philosophisch-Theologische Hochschule Sankt Georgen',
        'Potsdam Institute for Climate Impact Research',
        'Propylaeum - Specialized Information Service Classics',
        'Protestant University of Applied Sciences RWL',
        'Pädagogische Hochschule Heidelberg',
        'Research Institute for farm animal biology (FBN)',
        'Reutlingen University / Hochschule Reutlingen',
        'Rheinische Fachhochschule Köln gGmbH',
        'Rhine-Waal University of Applied Sciences',
        'Rostock University Medical Center',
        'Rostock University of Music and Drama',
        'Ruhr-Universität Bochum',
        'RWTH Aachen University',
        'Saarland University',
        'SLUB Dresden',
        'South Westphalia University of Applied Sciences',
        'Staatliche Kunstsammlungen Dresden',
        'State University of Music and the Performing Arts Stuttgart',
        'Technical University of Applied Sciences Rosenheim',
        'Technical University of Applied Sciences Wildau',
        'Technical University of Darmstadt',
        'Technical University of Munich (TUM)',
        'Technische Hochschule Aschaffenburg',
        'Technische Hochschule Bingen',
        'Technische Hochschule Ingolstadt',
        'Technische Hochschule Lübeck - University of Applied Sciences',
        'Technische Hochschule Mittelhessen',
        'Technische Hochschule Nürnberg Georg Simon Ohm',
        'Technische Hochschule Ostwestfalen-Lippe',
        'Technische Hochschule Ulm',
        'Technische Universität Berlin',
        'Technische Universität Clausthal',
        'Technische Universität Dortmund',
        'Technische Universität Dresden',
        'Technische Universität Ilmenau',
        'TH Köln (University of Applied Sciences)',
        'The Berlin University of the Arts',
        'THGA Bochum',
        'Trier University',
        'Trier University of Applied Sciences',
        'Trossingen University of Music',
        'TU Bergakademie Freiberg',
        'TU Braunschweig',
        'TU Chemnitz',
        'TU Kaiserslautern',
        'Ulm University',
        'UniBw Munich',
        'University for music and theatre Leipzig',
        'University Hospital Carl Gustav Carus, Dresden',
        'University in Hagen',
        'University Koblenz-Landau',
        'University of Applied Forest Sciences Rottenburg',
        'University of Applied Science Kaiserslautern',
        'University of Applied Sciences Aachen',
        'University of Applied Sciences Augsburg',
        'University of Applied Sciences Dresden',
        'University of Applied Sciences Emden/Leer',
        'University of Applied Sciences Hof',
        'University of Applied Sciences Karlsruhe',
        'University of Applied Sciences Kehl',
        'University of Applied Sciences Landshut',
        'University of Applied Sciences Landshut',
        'University of Applied Sciences Ludwigsburg',
        'University of Applied Sciences Mannheim',
        'University of Applied Sciences Munich (HM)',
        'University of Applied Sciences Neu-Ulm',
        'University of Applied Sciences Nordhausen',
        'University of Applied Sciences Ravensburg Weingarten',
        'University of Applied Sciences Stralsund',
        'University of Augsburg',
        'University of Bamberg',
        'University of Bayreuth',
        'University of Bielefeld',
        'University of Education Gmuend',
        'University of Education Karlsruhe',
        'University of Erfurt',
        'University of Greifswald',
        'University of Hohenheim',
        'University of Konstanz',
        'University of Luebeck',
        'University of Mainz',
        'University of Mannheim',
        'University of Munich (LMU)',
        'University of Music and Performing Arts (HfMDK) Frankfurt/Main',
        'University of Music and Performing Arts Mannheim',
        'University of Music Freiburg',
        'University Of Passau',
        'University of Potsdam',
        'University of Regensburg',
        'University of Rostock',
        'University of Siegen',
        'University of Stuttgart',
        'University of Technology Nuremberg (UTN)',
        'University of the Arts Bremen',
        'University of Tübingen',
        'University of Vechta',
        'University of Veterinary Medicine Hannover (eduGAIN)',
        'University of Wuerzburg',
        'University of Wuppertal',
        'Universität Bonn',
        'Universität Bremen',
        'Universität Duisburg-Essen',
        'Universität Frankfurt',
        'Universität Hamburg (UHH)',
        'Universität Heidelberg',
        'Universität Hildesheim',
        'Universität Kassel',
        'Universität Münster',
        'Universität Oldenburg',
        'Universität Osnabrück',
        'Universität Speyer',
        'Universität zu Köln',
        'Verbundzentrale des GBV (VZG)',
        'VHO Einzelnutzer Nationallizenzen',
        'Virtual University of Bavaria (vhb)',
        'Weihenstephan-Triesdorf university of applied sciences. (IDP)',
        'Westfälische Hochschule, University of Applied Sciences',
        'Westsächsische Hochschule Zwickau',
        'WHU - Otto Beisheim School of Management',
        'Witten/Herdecke University',
        'Wuerzburg University Hospital',
        'Württemberg State Library Stuttgart',
        'ZALF Müncheberg IdP',
        'ZBW - Leibniz Information Centre for Economics',
        'Zeppelin University',
        'Zuse Institute Berlin'
    ];
}

function getAbstract() {
    let local = `
        The BMBF project OPTIMETA aims to strengthen the Open Access publishing system by connecting open
        citations and spatiotemporal metadata from open access journals with openly accessible data sources.
        For this purpose, we will extend Open Journal Systems (OJS) to give it functionalities for collecting
        and distributing open data by developing two OJS plugins for capturing citation networks and articles
        spatial and temporal properties as machine-readable and accessible metadata. We will ensure the target
        group-orientated design of the plugins by performing a comprehensive needs analysis for key stakeholders:
        the editors or operators of OA journals and the researchers, as authors and readers of articles.
        The developments will be designed and tested in cooperation with several independent journals
        and OA publishers. Overall, OPTIMETA supports the attraction of independent OA journals as publication
        venues by substantially improving the discoverability and visibility of OA publications through enrichment
        and interlinking of article metadata.`;

    return local.trim();
}

function getBody() {
    let local = `
            <h5>Project description</h5>
            <p><strong>Objective of the project and addressing the purpose of the grant</strong></p>
            <p>OPTIMETA extends the well-known publication platform for open access journals, OJS,
            with citation and spatiotemporal data for each article and thus improves the OA ecosystem
            on the metadata side. Two OJS plugins enable a large number of OJS-based OA journals
            to innovatively link publications via a significant improvement in metadata richness,
            diversity and quality. This strengthens the perceived quality of the publications, significantly
            increases their discoverability and thereby increases the attraction of small and
            independent journals. Overall, the project will enable numerous small and independent OA
            journals to contribute to establishing OA as the standard of scientific publishing, to improve
            the propagation of OA publications and to lead the way in innovative cooperations, based
            on free and open source software and open data.</p>
            
            <p style="text-align: center;">
            <img src="assets/img/TT-Logo.png" alt="TextTransfer Logo" style="height: 75px;"/>
            </p>
            
            <p><strong>Methodological approach to achieve the objective</strong></p>
            <p>Various methods are combined to achieve the project's objectives. A mixed-methods
            approach will be used for the needs analysis. Expert interviews with editors and operators
            of small and independent journals, as well as researchers, will be used to identify key
            requirements for the design and features of OJS plugins. Later, a quantitative survey of
            these stakeholders will be conducted to determine their needs and priorities regarding the
            enrichment of article metadata with citation and geodata. These needs will then be
            formulated in user stories, on the basis of which the initial conception and the
            implementation of the two plugins will take place. In an iterative development process, a
            prototype will be made available to the community for testing and installation at selected
            cooperating partner journals*12 will be actively supported. The feedback received during
            webinars and short surveys will flow back into the next iteration of conception and
            development. The development will take place in joint agile sprints of the partners. At the
            end of each sprint stands the release of a minimum viable product (MVP). The export of
            the citation and spatiotemporal metadata to the respective target systems will then be
            implemented in cooperation with the stakeholders. Dissemination and community outreach,
            for example, on the project website (https://projects.tib.eu/optimeta), project partner blogs
            and social media (https://twitter.com/optmta), will begin with the first contacts in the course
            of the needs analysis and will accompany the entire project. We will maximise probability of
            a broad uptake of the project results and the practice is maximised through the high
            quantity and quality of productive interactions with stakeholders (Wolf et al. 2013) and the
            publication of all developed software and documentation under open licences.</p>
            `;

    return local.trim();
}