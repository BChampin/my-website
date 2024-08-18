export const portfolioData = {
  main: {
    title: {
      en: 'Hi, I\'m',
      fr: 'Bonjour, moi c\'est'
    },
    subtitle: {
      en: 'Freelance full-stack web developer',
      fr: 'Développeur web full-stack freelance'
    },
    caption: {
      en: 'I develop beautifully simple web interfaces, and I think that\'s pretty cool !',
      fr: 'Je développe des interfaces web épurées et simples, et je trouve ça cool !'
    }
  },
  contact: {
    title: 'Contact',
    text: {
      en: 'Well, I think you\'ve seen quite a lot about me, now it\'s my turn to learn more about you ! You\'ve got a web project, an idea, and think that I could be a good fit ? Shoot me a mail or contact me on Malt and I will be happy to help you concretize your idea !',
      fr: 'Eh bien, je pense que vous avez vu beaucoup de choses sur moi, maintenant c\'est à mon tour d\'en apprendre davantage sur vous ! Vous avez un projet web, une idée, et pensez que je pourrais être un bon candidat ? Envoyez-moi un mail ou contactez-moi sur Malt et je me ferai un plaisir de vous aider à concrétiser votre idée !'
    },
    cta: {
      en: 'Copy email',
      fr: 'Copier mon email'
    },
    email: 'hello@champin.dev'
  },
  projectSection: {
    title: {
      en: 'Projects I\'ve worked on',
      fr: 'Projets sur lesquels j\'ai travaillé'
    },
    context: {
      en: 'Context',
      fr: 'Contexte'
    },
    description: {
      en: 'Description',
      fr: 'Description'
    },
    techs: {
      en: 'Technologies used',
      fr: 'Technologies utilisées'
    },
    dates: {
      en: 'Dates',
      fr: 'Dates'
    }
  },
  projects: {
    main: [
      {
        title: 'HappyCab',
        link: 'https://happycab.fr/',
        icon: '/logos/happycab.svg',
        cover: '/shots/happycab_01.png',
        description: {
          en: 'Happycab is a platform where accounting firms can develop their employer brand and attract accountants to their homes. We did a total technical and visual overhaul of the site as well as in the development of all the features it offers to firms. We started from scratch the v2 of the website, and using fresh and new techs or frameworks was so much enriching. I worked to deeply understand many concepts of Javascript, APIs, integrations and so much more.',
          fr: 'Happycab est une plateforme où les cabinets comptables peuvent développer leur marque employeur et attirer des comptables chez eux. Nous avons procédé à une refonte totale technique et visuelle du site ainsi qu\'au développement de toutes les fonctionnalités qu\'il propose aux entreprises. Nous sommes partis de zéro avec la version 2 du site Web, et l\'utilisation de nouvelles technologies ou de nouveaux frameworks a été très enrichissante. J\'ai travaillé pour comprendre en profondeur de nombreux concepts de Javascript, des API, des intégrations et bien plus encore.'
        },
        dates: '2020 - Now',
        context: {
          en: '2nd apprenticeship & Freelance',
          fr: '2ème apprentissage & Freelance'
        },
        techs: [
          { label: 'VueJS', icon: '/logos/vuejs.svg', link: 'https://vuejs.org/' },
          { label: 'Quasar', icon: '/logos/quasar.svg', link: 'https://quasar.dev/' },
          { label: 'Stelace', icon: '/logos/stelace.png', link: 'https://stelace.com/' }
        ],
        gallery: [
          '/shots/happycab_02.png',
          '/shots/happycab_03.png',
          '/shots/happycab_04.png',
          '/shots/happycab_01.png'
        ]
      },
      {
        title: 'Domo\'CHICK',
        link: 'https://domochick.com/',
        icon: '/logos/domochick.png',
        cover: '/shots/domochick_01.png',
        description: {
          en: 'A friend of mine recommended me to his company, since they needed a website to present and sell their brand new product : an automatic doorman for a chicken coop. Since the client needed to have a nice interface and be able to manage the website without me, we agreed to use a Wordpress. It was a long time since I used one, but it was an interesting challenge to pick the right plugins to match the client\'s needs.',
          fr: 'Un de mes amis m\'a recommandé à son entreprise, car ils avaient besoin d\'un site internet pour présenter et vendre leur tout nouveau produit : un portier automatique pour poulailler. Comme le client avait besoin d\'avoir une interface agréable et de pouvoir gérer le site sans moi, nous avons convenu d\'utiliser un Wordpress. Cela faisait longtemps que je n\'en avais aps mis en place, mais c\'était un défi intéressant de choisir les bons plugins pour répondre aux besoins du client.'
        },
        dates: '2022',
        context: {
          en: 'Freelance, in parallel with my work-study',
          fr: 'Freelance, en parallèle de mon alternance'
        },
        techs: [
          { label: 'Wordpress', icon: '/logos/wordpress.svg', link: 'https://wordpress.com/' }
        ],
        gallery: [
          '/shots/domochick_02.png',
          '/shots/domochick_03.png',
          '/shots/domochick_04.png',
          '/shots/domochick_01.png'
        ]
      },
      {
        title: 'MeilleurPlacement',
        link: 'https://placement.meilleurtaux.com/',
        icon: '/logos/meilleurplacement.svg',
        cover: '/shots/meilleurplacement_01.png',
        description: {
          en: 'I did 2 projects with MeilleurPlacement (Website & Form). The first one was the redesign of the company\'s website. The second one was about digitalizing a 60 pages life insurance form with complex rules. We had to refactor all the website frontend, applying the new graphical charter while keeping everything operational. Since we started the form from scratch, we were free for the techs\' choices, the organization of the code, and it was complex but very formative to do this.',
          fr: 'J\'ai réalisé 2 projets avec MeilleurPlacement (leur Site Internet & un Formulaire). Le premier a été la refonte du site internet de l\'entreprise. Le deuxième concernait la digitalisation d\'un formulaire d\'assurance vie de 60 pages avec des règles complexes. Nous avons dû refactoriser toute l\'interface du site, en appliquant la nouvelle charte graphique tout en gardant l\'ensemble opérationnel. Comme nous sommes repartis de zéro pour développer le formulaire, nous étions libres pour les choix des technologies, l\'organisation du code, et ce fut complexe mais très formateur de travailler avec ces clients.'
        },
        dates: '2019 - 2020',
        context: {
          en: '1st apprenticeship',
          fr: '1er apprentissage'
        },
        techs: [
          { label: 'VueJS (Form)', icon: '/logos/vuejs.svg', link: 'https://vuejs.org/' },
          { label: 'Laravel (Form)', icon: '/logos/laravel.svg', link: 'https://laravel.com/' },
          { label: 'CodeIgniter (Website)', icon: '/logos/codeigniter.svg', link: 'https://www.codeigniter.com/' },
          { label: 'MVC', icon: '/logos/mvc.png', link: 'https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller' }
        ],
        gallery: [
          '/shots/meilleurplacement_02.png',
          '/shots/meilleurplacement_03.png',
          '/shots/meilleurplacement_01.png'
        ]
      },
      {
        title: 'Aatchi',
        link: 'https://aatchi.fr/',
        icon: '/logos/aatchi.png',
        cover: '/shots/aatchi_01.png',
        description: {
          en: 'The objective of this project was to do a deep technical remake of the artist collective\'s website aatchi.fr, as well as simplifying its administration. This project was my first with a real client (Agile methods) but I managed to deliver a complete from-scratch project, using vanilla JS and PHP. Even so, all the requested features (and even more) were fully functionnal.',
          fr: 'L\'objectif de ce projet était de refondre techniquement en profondeur le site du collectif d\'artistes aatchi.fr, ainsi que d\'en simplifier l\'administration. Ce projet était mon premier avec un vrai client (méthodes Agile) mais j\'ai réussi à livrer un projet complet à partir de zéro, en utilisant du Javascript vanilla et du PHP. Malgré tout, toutes les fonctionnalités demandées (et même plus) étaient pleinement fonctionnelles.'
        },
        dates: '2018 - 2019',
        context: {
          en: 'DUT Informatic Technology',
          fr: 'DUT Informatique'
        },
        techs: [
          { label: 'Materialize', icon: '/logos/materialize.png', link: 'https://materializecss.com/' },
          { label: 'MVC', icon: '/logos/mvc.png', link: 'https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller' },
          { label: 'Javascript', icon: '/logos/javascript.svg', link: 'https://fr.wikipedia.org/wiki/JavaScript' },
          { label: 'PHP', icon: '/logos/php.svg', link: 'https://www.php.net/manual/fr/intro-whatis.php' }
        ],
        gallery: [
          '/shots/aatchi_02.png',
          '/shots/aatchi_03.png',
          '/shots/aatchi_01.png'
        ]
      }
    ]
  },
  links: {
    malt: { label: 'Malt', href: 'https://www.malt.fr/profile/bastienchampin' },
    github: { label: 'Github', href: 'https://github.com/BChampin' },
    gitlab: { label: 'Gitlab', href: 'https://gitlab.com/bastienggg-gitlab' },
    email: { label: 'Email', href: 'mailto:hello@champin.dev' }
  },
  experiences: [
    {
      title: {
        en: 'Freelance full-stack web developer',
        fr: 'Développeur web full stack en freelance'
      },
      dates: '2022 - Now',
      institution: 'On my own',
      location: '127.0.0.1'
    },
    {
      title: {
        en: 'Apprentice web developer',
        fr: 'Apprenti développeur web'
      },
      dates: '2020 - 2022',
      institution: 'HappyCab',
      link: 'https://happycab.fr/',
      location: 'Paris, France'
    },
    {
      title: {
        en: 'Apprentice web developer',
        fr: 'Apprenti développeur web'
      },
      dates: '2019-2020',
      institution: 'Digiplace',
      link: 'https://digiplace.fr/',
      location: 'Saint-Mandé, France'
    },
    {
      title: {
        en: 'Odoo modules intern developer',
        fr: 'Développeur de module Odoo stagiaire'
      },
      dates: '2019',
      institution: 'Createch Design',
      link: 'https://createchdesign.com/en/',
      location: 'Granby, Canada'
    }
  ],
  studies: [
    {
      title: {
        en: 'IT Project Manager',
        fr: 'Chef de projet Système d\'Information'
      },
      dates: '2019-2022',
      institution: {
        en: 'G4 Institute',
        fr: 'Institut G4'
      },
      link: 'https://www.institut-g4.fr/',
      location: 'Paris, France'
    },
    {
      title: {
        en: 'IT TUD',
        fr: 'DUT Informatique'
      },
      dates: '2017-2019',
      institution: {
        en: 'Caen UIT',
        fr: 'IUT de Caen'
      },
      link: 'https://iut-grand-ouest-normandie.unicaen.fr/',
      location: 'Caen, France'
    },
    {
      title: {
        en: 'Scientific baccalaureate with European mention',
        fr: 'Baccalauréat scientifique avec mention européenne'
      },
      dates: '2019',
      institution: {
        en: 'Jean Guéhenno high-school',
        fr: 'Lycée Jean Guéhenno'
      },
      link: 'https://www.lyceeguehennoflers.fr/',
      location: 'Flers, France'
    }
  ],
  skillsSection: {
    en: 'Skills & Tools',
    fr: 'Compétences & Outils'
  },
  skills: [
    {
      label: {
        en: 'Development',
        fr: 'Développement'
      },
      tools: [
        // https://icon-icons.com/
        { label: 'HTML 5', icon: '/logos/html5.svg', link: 'https://wikipedia.org/wiki/HTML5' },
        { label: 'CSS 3', icon: '/logos/css3.svg', link: 'https://wikipedia.org/wiki/CSS#CSS_3' },
        { label: 'Javascript', icon: '/logos/javascript.svg', link: 'https://www.javascript.com/' },
        { label: 'VueJS', icon: '/logos/vuejs.svg', link: 'https://vuejs.org/' },
        { label: 'NodeJS', icon: '/logos/nodejs.svg', link: 'https://nodejs.org/' },
        { label: 'MongoDB', icon: '/logos/mongodb.svg', link: 'https://www.mongodb.com/' },
        { label: 'PostgreSQL', icon: '/logos/postgresql.svg', link: 'https://www.postgresql.org/' },
        { label: 'PHP', icon: '/logos/php.svg', link: 'https://www.php.net/' }
      ]
    },
    {
      label: {
        en: 'Tools',
        fr: 'Outils'
      },
      tools: [
        { label: 'Quasar', icon: '/logos/quasar.svg', link: 'https://quasar.dev/' },
        { label: 'Git', icon: '/logos/git.svg', link: 'https://git-scm.com/' },
        { label: 'Nginx', icon: '/logos/nginx.svg', link: 'https://nginx.org/' },
        { label: 'Docker', icon: '/logos/docker.svg', link: 'https://www.docker.com/' },
        { label: 'Figma', icon: '/logos/figma.svg', link: 'https://figma.com/' },
        { label: 'Wordpress', icon: '/logos/wordpress.svg', link: 'https://wordpress.com/' },
        { label: 'AWS', icon: '/logos/aws.svg', link: 'https://aws.amazon.com/' },
        { label: 'Linux', icon: '/logos/linux.svg', link: 'https://www.linux.org/' }
      ]
    }
  ],
  about: {
    title: {
      en: 'About ...',
      fr: 'À propos de ...'
    },
    experiences: {
      en: 'My experiences',
      fr: 'Mes expériences'
    },
    studies: {
      en: 'My studies',
      fr: 'Mes études'
    }
  },
  lang: {
    switch: {
      en: 'Switch language',
      fr: 'Changer de langue'
    }
  },
  dark: {
    light: {
      en: 'Light mode',
      fr: 'Mode clair'
    },
    dark: {
      en: 'Dark mode',
      fr: 'Mode sombre'
    }
  }
}
