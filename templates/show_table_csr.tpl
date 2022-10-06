{include file="header.tpl"}

    {include file="vue/task_list.tpl"}

    <form id="form-stock" action="insert" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="brand" placeholder="Brand">
        <input type="number" name="amount"  max="10">
        <input type="checkbox" name="ended" id="ended">
        <input type="file" name="image" id="">
        <input type="submit" value="Insert">
    </form>

    <script src="js/tasks.js"></script>
    </body>
</html>