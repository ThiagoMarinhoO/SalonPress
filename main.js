// ===========SCROLLREVEAL==========
const Scrollwindow = {
    bttButton: document.querySelector('.back-to-top'),

    scrollReveal: ScrollReveal({
        origin: 'top',
        distance: '30px',
        duration: 700,
        reset: true
    }),

    backToTop() {
        window.addEventListener('scroll', () => {
            if (window.scrollY >= 560) {
                this.bttButton.classList.add('show')
            } else {
                this.bttButton.classList.remove('show')
            }
        })
    },
    revealElements() {
        this.scrollReveal.reveal(
            `
      #home .image, #home .text,
      #about .image, #about .text,
      #services header, #services .card,
      #testimonials header, #testimonials .testimonial blockquote,
      #contact .text, #contact .links, footer .brand, footer .social
      `,
            { interval: 100 }
        )
    }
}

// ===========SCROLLREVEAL==========
const Swipper = {}

// ==========MENU============
const Menu = {
    toggleMenu() {
        const nav = document.querySelector('#header nav')
        const toggle = document.querySelectorAll('nav .toggle')

        toggle.forEach(element => {
            element.addEventListener('click', () => {
                nav.classList.toggle('show')
            })
        })
    },

    hideMenu() {
        const nav = document.querySelector('#header nav')
        const links = document.querySelectorAll('.menu ul li a')

        links.forEach(element => {
            element.addEventListener('click', () => {
                nav.classList.remove('show')
            })
        })
    },

    shadowScrollMenu() {
        const header = document.querySelector('#header')
        const navHeight = header.offsetHeight

        window.addEventListener('scroll', () => {
            if (window.scrollY >= navHeight) {
                // add classe scrol ao header
                header.classList.add('scroll')
            } else {
                header.classList.remove('scroll')
            }
        })
    }

    // allFunctions() {
    //   Menu.toggleMenu()
    //   Menu.hideMenu()
    //   Menu.shadowScrollMenu()
    // }
}

// ============APLICAÇÃO================

const App = {
    Init() {
        Menu.toggleMenu()
        Menu.hideMenu()
        Menu.shadowScrollMenu()
        Scrollwindow.revealElements()
        // TestimonialSlider.testimonialSlider()
        Scrollwindow.backToTop()
    }
}

App.Init()
