function showStagioni( id) {
    var show = document.getElementById('boxStagioni'.concat(id));
    var down = document.getElementById('downStagioni'.concat(id));
    var up = document.getElementById('upStagioni'.concat(id));

    down.style.display="none";
    up.style.display="inline-block";
    show.style.display="block";
}

function hideStagioni( id) {
    var show = document.getElementById('boxStagioni'.concat(id));
    var down = document.getElementById('downStagioni'.concat(id));
    var up = document.getElementById('upStagioni'.concat(id));

    down.style.display="inline-block";
    up.style.display="none";
    show.style.display="none";
}

function showEpisodi( id) {
    var show = document.getElementById('boxEpisodi'.concat(id));
    var down = document.getElementById('downStagione'.concat(id));
    var up = document.getElementById('upStagione'.concat(id));

    down.style.display="none";
    up.style.display="inline-block";
    show.style.display="block";
}

function hideEpisodi( id) {
    var show = document.getElementById('boxEpisodi'.concat(id));
    var down = document.getElementById('downStagione'.concat(id));
    var up = document.getElementById('upStagione'.concat(id));

    down.style.display="inline-block";
    up.style.display="none";
    show.style.display="none";
}