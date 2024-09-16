// JS BUAT HEADER GANTI WAKTU DI SCROLL
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    var heroSection = document.querySelector("#home");
    var heroHeight = heroSection.offsetHeight;
    
    // Default state to 'header-white'
    if (window.scrollY <= heroHeight) {
        header.classList.add("header-transparent");
        header.classList.remove("header-white");
    } else {
        header.classList.add("header-white");
        header.classList.remove("header-transparent");
    }
});

// Set initial state on page load
window.addEventListener("load", function() {
    var header = document.querySelector("header");
    var heroSection = document.querySelector("#home");
    var heroHeight = heroSection.offsetHeight;
    
    if (window.scrollY <= heroHeight) {
        header.classList.add("header-transparent");
        header.classList.remove("header-white");
    } else {
        header.classList.add("header-white");
        header.classList.remove("header-transparent");
    }
});

// lazy load for image
document.addEventListener("DOMContentLoaded", function() {
    var lazyloadImages;    
  
    if ("IntersectionObserver" in window) {
      lazyloadImages = document.querySelectorAll(".lazy");
      var imageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            var image = entry.target;
            image.src = image.dataset.src;
            image.classList.remove("lazy");
            imageObserver.unobserve(image);
          }
        });
      });
  
      lazyloadImages.forEach(function(image) {
        imageObserver.observe(image);
      });
    } else {  
      var lazyloadThrottleTimeout;
      lazyloadImages = document.querySelectorAll(".lazy");
      
      function lazyload () {
        if(lazyloadThrottleTimeout) {
          clearTimeout(lazyloadThrottleTimeout);
        }    
  
        lazyloadThrottleTimeout = setTimeout(function() {
          var scrollTop = window.pageYOffset;
          lazyloadImages.forEach(function(img) {
              if(img.offsetTop < (window.innerHeight + scrollTop)) {
                img.src = img.dataset.src;
                img.classList.remove('lazy');
              }
          });
          if(lazyloadImages.length == 0) { 
            document.removeEventListener("scroll", lazyload);
            window.removeEventListener("resize", lazyload);
            window.removeEventListener("orientationChange", lazyload);
          }
        }, 20);
      }
  
      document.addEventListener("scroll", lazyload);
      window.addEventListener("resize", lazyload);
      window.addEventListener("orientationChange", lazyload);
    }
})

// MENU TOGGLE FOR MOBILE
const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

menuToggle.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});

// MENU TOGGLE FOR MOBILE
const sideToggle = document.getElementById('side-toggle');
const sideMenu = document.getElementById('side-menu');

sideToggle.addEventListener('click', () => {
    sideMenu.classList.toggle('hidden');
});

// UNTUK BUTTON ACTIVE WAKTU DI HALAMAN/SECTION TERTENTU
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.header-nav a');
    const homeSection = document.getElementById('home');

    function setActiveLink() {
        let index = sections.length;
        let inHomeSection = window.scrollY < homeSection.offsetHeight;

        // Remove active class from all links
        navLinks.forEach(link => link.classList.remove('active'));

        if (inHomeSection) {
            // No active link if in the home section
            return;
        }

        // Determine which section is currently in view
        while(--index && window.scrollY + 50 < sections[index].offsetTop) {}

        // Add active class to the link corresponding to the current section
        if (index >= 0) {
            const targetLink = document.querySelector(`a[href="#${sections[index].id}"]`);
            if (targetLink) {
                targetLink.classList.add('active');
            }
        }
    }

    // Set active link on scroll
    window.addEventListener('scroll', setActiveLink);
    // Set active link on page load
    setActiveLink();

    // Smooth scrolling to section when clicking the nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            document.getElementById(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

function toggleModalLogin() {
    var modal = document.getElementById("loginFormModal");
    modal.classList.toggle("hidden");
}

document.getElementById("togglePassword").addEventListener("click", function () {
    var passwordField = document.getElementById("password");
    var eyeIcon = document.getElementById("eyeIcon");

    // Toggle the type attribute of the password field
    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3" stroke="none" fill="currentColor"></circle>';
    } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
    }
});

function toggleModalPoint() {
    var modal = document.getElementById("pointFormModal");
    modal.classList.toggle("hidden");
}

function togglePointForm() {
    var form = document.getElementById("pointSubmissionForm");
    form.classList.toggle("hidden");
}

function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('button')) {
        const dropdown = document.getElementById('dropdownMenu');
        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }
    }
}

// Loop untuk membuat 8 baris dan memasukkannya ke dalam tabel
for (let i = 1; i <= 7; i++) {
    tableBody.innerHTML += createRow(i);
}

$(document).ready(function () {
    $('#example').DataTable({
        // "scrollY": "260px",  
        // "scrollCollapse": true,
        "paging": false, 
        "searching": true,
        "info": false
    });
});

const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('scroll')) {
    var peringkatSection = document.getElementById('peringkat');
    if (peringkatSection) {
        peringkatSection.scrollIntoView({ behavior: 'smooth' });
    }
}

function openEditModal(id, jurusan, poin) {
    document.getElementById('editId').value = id;
    document.getElementById('editPoin').value = poin;
    document.getElementById('editForm').action = `/admin/update/${id}`;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function openDeleteModal(action) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}