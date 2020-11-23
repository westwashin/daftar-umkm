<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
        function backupDatabaseTables(){
            $.get("backup.php", function(){
            })
            setTimeout(backupDatabaseTables, 500000);
        }
        backupDatabaseTables();     
</script>