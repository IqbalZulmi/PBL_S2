// menentukan elemen navbar
var navbar = document.querySelector("#navbar-example2");
// menentukan posisi awal elemen
var posisiAwal = navbar.offsetTop;
// menambahkan event listener untuk mengubah posisi elemen saat scrolling
window.addEventListener("scroll", function () {
    if (window.pageYOffset >= posisiAwal) {
        navbar.classList.add("fixed-top");
    } else {
        navbar.classList.remove("fixed-top");
    }
});

//active
var navLinks = document.querySelectorAll('.nav-link');
var currentUrl = window.location.href;
navLinks.forEach(function (link) {
    if (link.href === currentUrl) {
        link.classList.add('active');
    }
});

//animasi navbar-pertama
var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar-atas").style.top = "0";
        } else {
            document.getElementById("navbar-atas").style.top = "-80px";
        }
        prevScrollpos = currentScrollPos;
    };

//menutup navbar-pertama saat offcanvas dibuka
$('#offcanvasNavbar').on('shown.bs.offcanvas', function () {
    $('#navbar-atas').css('transform', 'translateY(-80px)');
});

$('#offcanvasNavbar').on('hidden.bs.offcanvas', function () {
    $('#navbar-atas').css('transform', 'translateY(0)');
});


//lightbox review and home magnific
$(document).ready(function () {
    $('.review').click(function () {
        var pdfUrl = $(this).closest('td').find('iframe').attr('src');
        $.magnificPopup.open({
            items: {
                src: pdfUrl
            },
            type: 'iframe'
        });
    });
    $('.image-link').magnificPopup({
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
	});
    $('.btn-view').on('click', function (e) {
        e.preventDefault();
        var file = $(this).closest('.row').find('input[type=file]').prop('files')[0];
        if (!file) {
            alert('Mohon pilih file terlebih dahulu');
            return;
        }
        var fileURL = URL.createObjectURL(file);
        var fileType = file.type.split('/')[0];
        if (fileType == 'application' || fileType == 'text') {
            $.magnificPopup.open({
                items: {
                    src: fileURL,
                    type: 'iframe'
                },
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">' +
                        '<div class="mfp-close"></div>' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '</div>',
                    patterns: {
                        pdf: {
                            index: '.pdf',
                            src: '%id'
                        },
                        doc: {
                            index: '.doc, .docx',
                            src: '%id',
                            type: 'application/msword'
                        },
                        xls: {
                            index: '.xls, .xlsx',
                            src: '%id',
                            type: 'application/vnd.ms-excel'
                        },
                        ppt: {
                            index: '.ppt, .pptx',
                            src: '%id',
                            type: 'application/vnd.ms-powerpoint'
                        }
                    }
                },
                callbacks: {
                    elementParse: function (item) {
                        if (item.src.indexOf('.pdf') !== -1) {
                            item.type = 'iframe';
                        }
                        if (item.src.indexOf('.doc') !== -1 || item.src.indexOf('.docx') !== -1) {
                            item.type = 'iframe';
                            item.iframe.type = 'application/msword';
                        }
                        if (item.src.indexOf('.xls') !== -1 || item.src.indexOf('.xlsx') !== -1) {
                            item.type = 'iframe';
                            item.iframe.type = 'application/vnd.ms-excel';
                        }
                        if (item.src.indexOf('.ppt') !== -1 || item.src.indexOf('.pptx') !== -1) {
                            item.type = 'iframe';
                            item.iframe.type = 'application/vnd.ms-powerpoint';
                        }
                    }
                }
            });
        } else {
            window.open(fileURL, '_blank');
        }
    });
});

//hide button input file
function showButton(input) {
    const btnWrapper = input.parentElement.nextElementSibling;
    const btn = btnWrapper.querySelector('.btn-view');
    if (input.files.length > 0) {
        btn.classList.remove('d-none');
    } else {
        btn.classList.add('d-none');
    }
}


//pagination dan show data tabel
const table = document.querySelector('.table');
const tableRows = table.querySelectorAll('tbody tr');
const select = document.querySelector('.form-select');
const prevButton = document.getElementById('previous');
const nextButton = document.getElementById('next');

let currentPage = 1;
let rowsPerPage = parseInt(select.value);

select.addEventListener('change', () => {
    rowsPerPage = parseInt(select.value);
    currentPage = 1;
    showRows(currentPage);
    updateButtons();
});

function showRows(page) {
    let start = 0;
    let end = tableRows.length;

    if (rowsPerPage !== -1) {
        start = (page - 1) * rowsPerPage;
        end = start + rowsPerPage;
    }

    tableRows.forEach((row, index) => {
        if (index >= start && index < end) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function updateButtons() {
    if (currentPage === 1) {
        prevButton.classList.add('disabled');
    } else {
        prevButton.classList.remove('disabled');
    }

    if (rowsPerPage === -1 || currentPage === Math.ceil(tableRows.length / rowsPerPage)) {
        nextButton.classList.add('disabled');
    } else {
        nextButton.classList.remove('disabled');
    }

}

function showPrevPage() {
    currentPage--;
    showRows(currentPage);
    updateButtons();
}

function showNextPage() {
    currentPage++;
    showRows(currentPage);
    updateButtons();
}

updateButtons();
showRows(currentPage);

prevButton.addEventListener('click', () => {
    if (!prevButton.classList.contains('disabled')) {
        showPrevPage();
    }
});

nextButton.addEventListener('click', () => {
    if (!nextButton.classList.contains('disabled')) {
        showNextPage();
    }
});


//search
function cari(columnNumber) {
    const input = document.querySelector('input[name="text"]');
    input.addEventListener('input', function() {
        const searchText = this.value.trim().toLowerCase();
        const rows = table.querySelectorAll('tbody tr');
        for (const row of rows) {
            const text = row.querySelector('td:nth-child(' + columnNumber + ')').textContent.trim().toLowerCase();
            if (text.includes(searchText)) {
                row.classList.remove('d-none');
            } else {
                row.classList.add('d-none');
            }
        }
    });
}

//profile
function enableinput() {
    var inputFields = document.getElementsByClassName("buka");
    var editButton = document.getElementById("editButton");
    var x = document.getElementsByClassName("unedit");
    if (inputFields[0].disabled) {
        // jika input field dalam keadaan non-aktif
        for (var y = 0; y < x.length; y++) {
            x[y].disabled = false;
        }
        for (var i = 0; i < inputFields.length; i++) {
            inputFields[i].disabled = false;
            inputFields[i].readOnly = false;
        }
        editButton.innerHTML = '<i class="fa-solid fa-times"></i> Cancel Edit';
        editButton.classList.remove("btn-outline-warning");
        editButton.classList.add("btn-outline-danger");
    } else {
        // jika input field dalam keadaan aktif
        for (var y = 0; y < x.length; y++) {
            x[y].disabled = true;
        }
        for (var i = 0; i < inputFields.length; i++) {
            inputFields[i].disabled = true;
            inputFields[i].readOnly = true;
        }
        editButton.innerHTML = '<i class="fa-solid fa-gear"></i> Edit';
        editButton.classList.remove("btn-outline-danger");
        editButton.classList.add("btn-outline-warning");
    }
}

//select-filter-usulan
function toggleUploadField(selectElement) {
    var selectFilterElements = document.getElementsByClassName("select-filter");
    for (var i = 0; i < selectFilterElements.length; i++) {
        selectFilterElements[i].style.display = (selectElement.value === "Tidak") ? "none" : "";
    }
}

//validasi input pdf
function validasi(input){
    var filename = input.value.trim();

    var extIndex = filename.lastIndexOf('.');
    var fileExntension = filename.slice(extIndex).toLowerCase();

    if (fileExntension !== ".pdf"){
        Swal.fire({
            text: 'Tipe File harus PDF !',
            icon: 'warning',
            confirmButtonText:'OK',
            showCloseButton: true,
            timer: 2000,
        })
        input.value = "";
        return false;
    }

    return true;
}

//select-filter-alasan
function filterAlasan(selectElement) {
    var alasanLabel = document.getElementById("alasanLabel");
    var alasanTextarea = document.getElementById("alasanTextarea");

    if (selectElement.value === "perlu direvisi") {
        alasanLabel.classList.remove("d-none");
        alasanLabel.classList.add("d-block");
        alasanTextarea.classList.remove("d-none");
        alasanTextarea.classList.add("d-block");
    } else {
        alasanLabel.classList.remove("d-block");
        alasanLabel.classList.add("d-none");
        alasanTextarea.classList.remove("d-block");
        alasanTextarea.classList.add("d-none");
    }
}

//logout
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

if (window.performance && window.performance.navigation.type === 2) {
    // Tombol "Back" ditekan
    window.location.href = "/login";
}

window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
};
