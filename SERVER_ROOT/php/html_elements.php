
<?php

$html_element = "";

function get_html_header_code()
{


  /*
  IF SESSION

  HELLO firstname
  LOGOUT
  
  */

  $html_element = '
    
    <!-- Navbar start -->
      <header>
        <nav class="navbar">
          <div class="max-width">
            <div class="logo">
              <a href="index.php">
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
      </header>
    <!-- Navbar end -->

    ';

  /*
  IF NOT SESSION

  HELLO
   - LOGIN
   - REGISTER

  */

  echo $html_element;
}

function get_html_footer_code()
{

  //dit eenmaal wijzigen om data in te plooien
  $html_element = '

    <!-- footer start -->
      <footer>
        <span>Created By <a href="https://www.vives.be/nl" target="_blank">Vives</a> | <span class="far fa-copyright"></span> 2020 All rights reserved.</span>
      </footer>
    <!-- footer start -->

    ';

  echo $html_element;
}

function get_html_ERROR_code()
{

  $html_element = "";

  return $html_element;
}
