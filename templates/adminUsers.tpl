<div class="container">
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Credential</th>
      </tr>
      {foreach from=$users item=user}
      <tr>
        <td>{$usuario['id']}</td>
        <td>{$usuario['email']}</td>
        <td>{$usuario['credential']}</td>
        <td><button type="button" class="changeCredential btn btn-success"  data-id_user="{$user['id_user']}">Change Credential</button></td>
        <td><button type="button" class="deleteUser btn btn-warning" data-id_user="{$user['id_user']}">Delete User</button></td>
      </tr>
      {/foreach}
    </table>
  </div>
</div>