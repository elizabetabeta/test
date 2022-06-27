@User
    <div class="list-group">
        <a href="/oglasi" class="list-group-item list-group-item-action">Svi oglasi</a>
        <a href="/mojioglasi" class="list-group-item list-group-item-action">Moji oglasi</a>
        <img src="lisica.png">
    </div>
@endUser
@Moderator
    <div class="list-group">
        <a href="/oglasi" class="list-group-item list-group-item-action">Uređivanje oglasa</a>
        <a href="/mojioglasi" class="list-group-item list-group-item-action">Moji oglasi</a>
        <img src="lisica.png">
    </div>
@endModerator
@Admin
    <div class="list-group">
        <a href = "{{ route("users") }}" class="list-group-item list-group-item-action">Administracija korisnika</a>
        <a href="/oglasi" class="list-group-item list-group-item-action">Uređivanje oglasa</a>
        <img src="lisica.png">
    </div>
@endAdmin
