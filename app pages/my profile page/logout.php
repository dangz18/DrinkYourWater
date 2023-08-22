<?php
session_start();
session_destroy();
header("Location: \\hydrationapp\\authentication pages\\login\\login_index.html");
exit;