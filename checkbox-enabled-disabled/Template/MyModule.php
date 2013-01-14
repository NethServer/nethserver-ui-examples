<?php
// set title
echo $view->header()->setAttribute('template', $T('MyModule_Title'));

// add simple panel
echo $view->panel()
    //add 'status' parameter checkbox with value when checked and unchecked
    ->insert($view->checkbox('status', 'enabled')->setAttribute('uncheckedValue', 'disabled')
);

// show submit and help buttons
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
