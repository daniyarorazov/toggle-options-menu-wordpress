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
    $(document).ready(function() {
        var navBlock = document.querySelector("#product-147 > div.summary.entry-summary > h1")
        const formBlock = document.querySelector("#respond")
        $(formBlock).append("<button class='edit-fields'>Edit fields showing</button>")
        $(formBlock).append("<button class='option-button save-changes-fields'>Save</button>")
        $(formBlock).append("<button class='option-button cancel-changes-fields'>Cancel</button>")
        const btn = document.querySelector('.edit-fields');
        const field_rating = document.querySelector("#commentform > div > label")
        const field_review = document.querySelector("#commentform > p.comment-form-comment > label")
        const btn_submit = document.querySelector("#submit");
        $("<input type='checkbox' class='checkbox-menu-option option_field_rating'  checked/>").insertBefore(field_rating)
        $("<input type='checkbox' class='checkbox-menu-option option_field_review'  checked/>").insertBefore(field_review)
        $("<input type='checkbox' class='checkbox-menu-option option_btn_submit'  checked/>").insertBefore(btn_submit)

        // Add an event listener to the navBlock element
        const checkboxMenuOption = document.querySelectorAll('.checkbox-menu-option');
        const optionButton = document.querySelectorAll('.option-button');
        btn.addEventListener('click', function() {
            $(checkboxMenuOption).css('display', 'block');
            $(optionButton[0]).css('display', 'block');
            $(optionButton[1]).css('display', 'block');
            $(this).hide();

            for (let elem of checkboxMenuOption) {
                // let a = getValueAttr(elem.parentNode.classList.value, 'checked');
                let parentBlock = document.querySelector(`.${elem.parentNode.classList.value}`);

                console.log(parentBlock)
                $(parentBlock).show();
            }
        });

        const saveChangesBtn = document.querySelector('.save-changes-fields');
        const cancelChangesBtn = document.querySelector('.cancel-changes-fields');

        saveChangesBtn.addEventListener('click', () => {
            $(checkboxMenuOption).css('display', 'none');
            $(btn).show()
            $(saveChangesBtn).css('display', 'none')
            $(cancelChangesBtn).css('display', 'none')

            for (let elem of checkboxMenuOption) {
                // let a = getValueAttr(elem.parentNode.classList.value, 'checked');
                let parentBlock = document.querySelector(`.${elem.parentNode.classList.value}`);

                if ($(elem).prop("checked")) {

                } else {
                    $(parentBlock).hide();
                }


                // if (a === false) {
                //     let parentBlock = $(`.${elem.parentNode.classList.value}`);
                //     $(parentBlock).attr('dataVisible', 'false');
                //     $(parentBlock).css('dataVisible', 'false');
                //     $(parentBlock).hide();

                // } else {
                //     let parentBlock = $(`.${elem.parentNode.classList.value}`);

                //     $(parentBlock).show();
                // }
            }

        });

        cancelChangesBtn.addEventListener('click', () => {
            $(checkboxMenuOption).css('display', 'none');
            $(btn).show()
            $(saveChangesBtn).css('display', 'none')
            $(cancelChangesBtn).css('display', 'none')

            for (let elem of checkboxMenuOption) {
                // let a = getValueAttr(elem.parentNode.classList.value, 'checked');
                let parentBlock = document.querySelector(`.${elem.parentNode.classList.value}`);

                if ($(elem).prop("checked")) {

                } else {
                    $(parentBlock).hide();
                }
            }

            // if (getValueAttr())
        });


        // for (let elem of checkboxMenuOption) {
        //     $(checkboxMenuOption).change(() => {
        //         if ($(elem).prop("checked")) {
        //             let parentBlock = $(`.${elem.parentNode.classList.value}`);
        //             $(parentBlock).show();
        //             localStorage.setItem(parentBlock, true);
        //         } else {
        //             let parentBlock = $(`.${elem.parentNode.classList.value}`);
        //             $(parentBlock).attr('dataVisible', 'false');
        //             localStorage.setItem(parentBlock, false);

        //         }
        //     });
        // }





    });

    function getValueAttr(classBlock, nameAttr) {
        let prices = [];
        $(`.${classBlock}[${nameAttr}]`).val(function() {
            prices.push($(this).attr(nameAttr))
        });
        prices = prices.toString();
        return prices;
    }
</script>