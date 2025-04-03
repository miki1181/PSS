{extends file="main.tpl"}

{block name="title"}Edytuj Transakcję{/block}

{block name="content"}
<h1>Edytuj transakcję</h1>

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
        <label for="amount" class="form-label">Kwota</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{$transaction.kwota}" step="1" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <select class="form-select" id="type" name="type" required>
            <option value="przychód" {if $transaction.typ == 'przychód'}selected{/if}>Przychód</option>
            <option value="wydatek" {if $transaction.typ == 'wydatek'}selected{/if}>Wydatek</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Kategoria</label>
        <input type="text" class="form-control" id="category" name="category" value="{$transaction.kategoria}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Opis</label>
        <textarea class="form-control" id="description" name="description">{$transaction.opis|escape}</textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" id="date" name="date" value="{$transaction.data_transakcji}" required>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
</form>
{/block}
