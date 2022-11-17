<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/estiloburg.css">
    </head> 
    <body>
        <button 
        type="button"
        class="burger"
        onclick="toggleSidebar()"></button>
        <img class="logo" src="../img/logo.jpeg"/>
        <aside class="sidebar">
            <header class="sidebar-header">                
            </header>
            <nav>
                <button type="button">      
                    <a href="../php/almacen.php">              
                    <img src="../img/almacen.png" width="100"/>
                    
                    </a>
                    <span>Home</span>
                </button>
            </nav>
            <nav>
                <button type="button">      
                    <a href="../php/almacen.php">              
                    <img src="../img/close.png" width="100"/>
                    
                    </a>
                    <span>Home</span>
                </button>
            </nav>
        </aside>
        <script type="text/javascript">
            const toggleSidebar= ()=>
            document.body.classList.toggle("open");
        </script>
    </body>
</html>