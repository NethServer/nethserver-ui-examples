<?php
// set title
echo $view->header()->setAttribute('template', $T('MyModule_Title'));

// add simple panel
echo $view->panel()
    ->insert($view->selector('MyValues', $view::SELECTOR_DROPDOWN))
);

// show submit and help buttons
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
