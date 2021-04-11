<label for="name">Имя</label>
<input type="text" id="name">
<label for="phone">Телефон</label>
<input type="text" id="phone">
<label for="e-mail">e-mail</label>
<input type="text" id="e-mail">
<hr/>
<p><a href="main/form">Добавить запись</a></p>
<hr/>

<? foreach ($data as $client) { ?>
    <div class="client-record" data-client-id="<?= $client['id'] ?>">
        <p>Имя: <?= $client['name'] ?></p>
        <p>Телефон: <?= $client['phone'] ?></p>
        <p>e-mail: <?= $client['email'] ?></p>
        <a href="main/delete/<?= $client['id'] ?>">Удалить</a>
        <hr/>
    </div>
<? } ?>


<? $jsonClients = json_encode($data); ?>

<script>
    const clients = <?= $jsonClients?>;

    const nameElem = document.getElementById('name');
    const phoneElem = document.getElementById('phone');
    const emailElem = document.getElementById('e-mail');
    const allClientRecords = document.getElementsByClassName('client-record');

    document.addEventListener("input", e => {
        const nameRegExp = new RegExp(nameElem.value, 'i');
        const phoneRegExp = new RegExp(phoneElem.value, 'i');
        const emailRegExp = new RegExp(emailElem.value, 'i');


        const showItems = clients.filter(e =>
            nameRegExp.test(e.name) &&
            phoneRegExp.test(e.phone) &&
            emailRegExp.test(e.email));

        showId = [];

        showItems.forEach(e => showId.push(e.id));
        hiddenItem(showId);
    });

    function hiddenItem(showId) {
        for (let i=0; i<allClientRecords.length; i++) {
            if (showId.indexOf(allClientRecords[i].dataset.clientId) == -1) {
                allClientRecords[i].style.display = 'none';
            } else {
                allClientRecords[i].style.display = 'block';
            }
        }
    }
</script>
