        <footer>
            <ul>
                <li><a href="#"><i class="fa fa-facebook "></i></a></li>
                <li><a href="#"><i class="fa fa-twitter "></i></a></li>
            </ul>
            <ul>
                <?php if(isset($_SESSION['login'])){ ?>
                <li><a href="logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </footer>       
    </div>
    <script src="../js/lightbox-plus-jquery.js"></script>
    <script src="../js/lightbox-plus-jquery.min.map.js"></script>
</body>
</html>