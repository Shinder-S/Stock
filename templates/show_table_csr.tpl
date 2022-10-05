{include file="header.tpl"}

    {include file="vue/task_list.tpl"}

    <form action="insert" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="stock"  max="10">
        <input type="checkbox" name="ended" id="ended">
        <input type="file" name="image" id="">
        <input type="submit" value="Insertar">
    </form>

    <script src="js/tasks.js"></script>
    </body>
</html>