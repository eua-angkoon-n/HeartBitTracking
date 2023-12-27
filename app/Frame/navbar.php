  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white nav-gradient" >
    <div class="container">
      <a href="./" class="navbar-brand">
        <img src="dist/img/HeartbitLogo.jpg" alt="HeartBit Logo" class="brand-image img-circle elevation-3"  style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="https://www.facebook.com/HeartBitCosShop" class="nav-link" style="color:#5d0101" target="_blank"><strong>Facebook</strong></a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
        <div class="ul-datetime-clock" >
                        <ul>
                            <li style="color:#5d0101">วัน<?php echo Setting::$arr_day_of_week[date('N', strtotime('today'))]; ?>ที่ 
                                <?php echo nowDate(date('Y-m-d H:i:s')); ?>&nbsp;
                            </li>
                            <li id="currentTime" style="color:#5d0101"></li>
                        </ul>
                    </div>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->