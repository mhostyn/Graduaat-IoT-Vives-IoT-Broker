
<?php

$html_element = "";

function get_html_header_code() {

    $html_element = '
    
    <!-- header start -->

        <p>
          
        </p>

    <!-- header end -->
    
    ';

    echo $html_element;
}


function get_html_navbar_code() {

    $html_element = '
    
    <!-- Navbar start -->
        <nav class="navbar">
          <div class="max-width">
            <div class="logo">
              <a href="./index.html">
                IoT
                <span>
                  Broker.
                </span>
              </a>
            </div>

            <ul class="menu">
              <li>
                <a href="#" class="menu-btn">
                  Dag <?php echo $fetch_info[\'firstname\']?>!
                </a>
              </li>
              <li>
                <a href="./logout.php" class="menu-btn-logout">
                Logout
                </a>
              </li>
            </ul>

            <div class="menu-btn">
              <i class="fas fa-bars">
              </i>
            </div>
          </div>
        </nav>
    <!-- Navbar end -->

    ';

    echo $html_element;
}

function get_html_footer_code() {
    
    //dit eenmaal wijzigen om data in te plooien
    $html_element = '

    <!-- Navbar start -->

        <footer>
          <span>Created By <a href="https://www.vives.be/nl" target="_blank">Vives</a> | <span class="far fa-copyright"></span> 2020 All rights reserved.</span>
        </footer>

    <!-- Navbar start -->

    ';

    echo $html_element;
}

function get_html_ERROR_code() {

    $html_element = "";

    return $html_element;
}
