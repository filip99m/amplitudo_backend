    <!-- Modal dodavanje -->
    <div class="modal fade" id="modal_dodavanje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodavanje novog zadatka</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="adding_a_new_one.php" method="POST" id="dodaj_novi_forma">
                    <input class="form-control" type="text" name="tekst" id="novi_zadatak_tekst" placeholder="Unesite tekst novog..." >
                    <br>
                    <textarea class="form-control" rows="5" name="opis" id="novi_zadatak_opis" placeholder="Unesite opis..."></textarea>
                    <br>
                    <button class="btn btn-success btn-block">Dodaj novi</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>