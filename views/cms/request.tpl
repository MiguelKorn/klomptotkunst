<div id="request">
    <table id="requests">
        <section>
            {foreach from=$result item=oneItem}
                <p>{$oneItem.contacts_id}</p>
                <p>{$oneItem.first_name}</p>
                <p>{$oneItem.last_name}</p>
                <p>{$oneItem.roles_id}</p>
                <p>{$oneItem.validated}</p>
            {/foreach}
            <form method="post"><input type="button">Accept<input type="button">Decline</form>
        </section>

    </table>
</div>