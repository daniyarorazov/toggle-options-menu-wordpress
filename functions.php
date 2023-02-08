<?php

function add_jquery_cdn()
{
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
}
add_action('wp_enqueue_scripts', 'add_jquery_cdn');

function my_custom_scripts()
{
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/custom-script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_scripts');

?>

<style>
    #product-147>div.summary.entry-summary>h1 {
        font-weight: 700;
    }

    .checkbox-menu-option,
    .option-button,
    .checkbox-menu-option-active,
    .hide-element {
        display: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var script = document.createElement('script');
    script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
    script.type = 'text/javascript';
    document.getElementsByTagName('head')[0].appendChild(script);

    script.onload = function() {
        $(document).ready(function() {
            const formBlock = document.querySelector(".woocommerce-MyAccount-navigation")
            $(formBlock).append("<button class='edit-fields'>Edit fields showing</button>")
            $(formBlock).append("<button class='option-button save-changes-fields'>Save</button>")
            const btn = document.querySelector('.edit-fields');
            const optionsMenu = document.querySelectorAll('.woocommerce-MyAccount-navigation-link > a');


            let itemFromDB = localStorage.getItem("menuoptionsMenuVisibilityState");
            let listData = []
            if (itemFromDB == null) {
                for (let i = 0; i < optionsMenu.length; i++) {
                    listData.push('true')
                }
            } else {
                listData = itemFromDB.split(',');
            }
            console.log(listData)
            for (let i = 0; i < listData.length; i++) {
                // if (optionsMenu[i]) Проверить родителя и сравнять классы, тогда убрать уже у него чекбокс
                if (listData[i] == "true") {
                    $(`<input type='checkbox' class='checkbox-menu-option' checked='${true}'/>`).insertBefore(optionsMenu[i])
                } else {
                    $(`<input type='checkbox' class='checkbox-menu-option'/>`).insertBefore(optionsMenu[i])

                }
            }

            // Add an event listener to the navBlock element
            const checkboxMenuOption = document.querySelectorAll('.checkbox-menu-option');
            const optionButton = document.querySelectorAll('.option-button');

            for (let elem of checkboxMenuOption) {
                let parentBlock = document.getElementsByClassName(`${elem.parentNode.classList.value}`);



                if ($(elem).prop("checked")) {
                    $(parentBlock).show();
                } else {
                    $(parentBlock).hide();
                }
            }

            btn.addEventListener('click', function() {
                $(checkboxMenuOption).css('display', 'inline-block');
                $(optionButton[0]).css('display', 'inline-block');
                $(optionButton[1]).css('display', 'inline-block');
                $(this).hide();

                for (let elem of checkboxMenuOption) {

                    let parentBlock = document.getElementsByClassName(`${elem.parentNode.classList.value}`);

                    $(parentBlock).show();
                }
            });

            const saveChangesBtn = document.querySelector('.save-changes-fields');

            saveChangesBtn.addEventListener('click', () => {
                $(checkboxMenuOption).css('display', 'none');
                $(btn).show()
                $(saveChangesBtn).css('display', 'none')

                let listValues = [];
                for (let elem of checkboxMenuOption) {
                    let parentBlock = document.getElementsByClassName(`${elem.parentNode.classList.value}`);

                    if ($(elem).prop("checked")) {
                        listValues.push(true)
                    } else {
                        listValues.push(false)
                        $(parentBlock).hide();
                    }
                }

                listValues = listValues.toString();

                localStorage.setItem("menuoptionsMenuVisibilityState", listValues);

            });
        });
    };
</script>


<ul>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-prehled is-active is-active">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-prehled/">Přehled prodejny</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-nabidka">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-nabidka/">Nabídka prodejny</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-objednavky">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-objednavky/">Historie objednávek</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-transakce">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-transakce/">Transakce</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-profil">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-profil/">Profil prodejny</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-upozorneni">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-upozorneni/">Upozornění</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-sledujici">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-sledujici/">Sledující</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--prodejna-dotaz-na-admina">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/prodejna-dotaz-na-admina/">Dotaz na admina</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/">Nástěnka</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/orders/">Objednávky</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/downloads/">Stahování</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/edit-address/">Adresy</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/edit-account/">Detaily účtu</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--oblibene-prodejny">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/oblibene-prodejny/">Oblíbené prodejny</a>
    </li>
    <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
        <a href="https://vyprodej.kuchyne-oresi.cz/muj-ucet/customer-logout/?_wpnonce=a30829046d">Odhlášení</a>
    </li>
</ul>