import './bootstrap';
import * as coreui from '@coreui/coreui';

window.coreui = coreui;

/* globals Chart:false */

$(function () {
    // Graphs
    const ctx = $('#myChart');
    if (ctx.length) {
        // eslint-disable-next-line no-unused-vars
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ],
                datasets: [{
                    data: [
                        15339,
                        21345,
                        18483,
                        24003,
                        23489,
                        24092,
                        12034
                    ],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        boxPadding: 3
                    }
                }
            }
        });
    }

    // Carousel - Property image item delete
    const carouselImgItems = $('.carousel-item-delete');
    if (carouselImgItems.length) {
        carouselImgItems.each(function () {
            $(this).click(function () {
                const data = $(this).data();
                if (data.confirm) {
                    const $modalEl = $('#modalConfirm');
                    const modalConfirm = new bootstrap.Modal($modalEl);
                    modalConfirm.show();
                    $modalEl.find('button[type="submit"]').on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        deleteImg(data);
                    });
                }
            });
        });
    }

    function deleteImg(data) {
        $.ajax({
            url: data.action,
            method: 'DELETE',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': data.csrf
            }
        }).done(function (response) {
            location.reload(true);
        });
    }

    // Multiselect Options Icon
    const myMutliSelect = document.getElementById('ms-icon');
    if (myMutliSelect) {
        myMutliSelect.addEventListener('shown.coreui.multi-select', event => {
            $('.form-multi-select-option').each(function () {
                $(this).first().prepend('<i class="bi bi-' + $(this).data('value') + '"></i>');
            });
        });
    }
});
