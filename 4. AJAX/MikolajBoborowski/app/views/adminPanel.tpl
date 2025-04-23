{extends file="main.tpl"}

{block name="title"}Panel administracyjny{/block}

{block name="content"}
    <h1>Panel administracyjny</h1>

{foreach $msgs->getMessages() as $msg}
    <div class="alert 
                {if $msg->isInfo()}alert-success{/if}
                {if $msg->isWarning()}alert-warning{/if}
                {if $msg->isError()}alert-danger{/if}" role="alert">
        {$msg->text}
    </div>
{/foreach}

<h3>Lista użytkowników</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Email</th>
            <th>Akcje</th>
            <th>Uprawnienia</th> 
        </tr>
    </thead>
    <tbody>
        {foreach $users as $user}
            <tr>
                <td>{$user.email}</td>
                <td>
    {if $user.nazwa_roli != 'admin'}
        <form method="post">
            <input type="hidden" name="delete_user_id" value="{$user.id}">
            <button type="submit" class="btn btn-danger">Usuń użytkownika</button>
        </form>
    {/if}
</td>
                <td>
                    {if $user.nazwa_roli != 'admin'}
                        <form method="post" action="promoteToAdmin">
                            <input type="hidden" name="promote_user_id" value="{$user.id}">
                            <button type="submit" class="btn btn-primary">Nadaj Admina</button>
                        </form>
                    {else}
                        <a>Admin</a>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
{/block}
