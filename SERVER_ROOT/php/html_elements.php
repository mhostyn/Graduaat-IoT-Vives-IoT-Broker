
<?php

$html_element = "";

function html_Footer() {
    
    //dit eenmaal wijzigen om data in te plooien
    $html_element = '
        <footer>
        <span>Created By <a href="https://www.vives.be/nl" target="_blank">Vives</a> | <span class="far fa-copyright"></span> 2020 All rights reserved.</span>
        </footer>'
    ;

    //dit om te wissen
    $html_element = "";

    return $html_element;
}

function html_Header() {

    $html_element = "";

    return $html_element;
}

function get_navbar() {

    $html_element = '
    
    <!-- Navbar start -->
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
            <a href="./index.html">IoT <span>Broker.</span></a>
            </div>
            <ul class="menu">
                <li>
                    <a href="#" class="menu-btn">Dag <?php echo $fetch_info[\'firstname\']?>!</a>
                </li>
                <li>
                    <a href="./logout.php" class="menu-btn-logout">Logout</a>
                </li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    
    ';

    echo $html_element;
}

function html_ERROR() {

    $html_element = "";

    return $html_element;
}
