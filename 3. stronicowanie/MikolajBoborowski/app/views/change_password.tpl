
{extends file="main.tpl"}

{block name="title"}Zmiana hasła{/block}

{block name="content"}
    <h1>Zmiana hasła</h1>

    {foreach $msgs->getMessages() as $msg}
        <div class="alert 
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}

    <form method="POST">
        <div class="mb-3">
            <label for="current_password" class="form-label">Obecne hasło</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nowe hasło</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required minlength="8">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Potwierdź nowe hasło</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required minlength="8">
        </div>
        <button type="submit" class="btn btn-primary">Zmień hasło</button>
    </form>
{/block}
