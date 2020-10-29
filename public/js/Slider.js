class Slider {

    constructor(target, pictures, time) {
        this.pictures = pictures;
        this.time = time;
        this.i = 0;
        document.getElementById(target).innerHTML = this.html(); //recupere ID du slider dans le HTML
        this.addBtnFct(); //ajout des boutons et de leur fonction
        //start animation
        this.anim;
        this.isOff;
        this.startAnim();

    }

    html() { //ajoute les boutons et les differentes DIV et appelle les images
            return "<div id='imgContainer'><img id='slideImg' src=" + this.pictures[0] + " alt='Diaporama'></div><br><div id='btnContainer'><i id='btnLeft' class='fas fa-chevron-left slider_elt' ></i><i id='btnPause' class='fas fa-pause  slider_elt' ></i><i id='btnPlay' class='fas fa-play slider_elt' ></i><i id='btnRight' class='fas fa-chevron-right slider_elt' ></i></div>";
        }
        /*--------------------------------------------------------------------------*/
        /*---------animation du slider----------------------------------------------*/
        /*--------------------------------------------------------------------------*/
    startAnim() {
        let that = this;
        that.anim = setInterval(function() {
            that.displayNext(1);
        }, that.time);
        that.isOff = false; // marche auto
    }
    stopAnim() {
        let that = this;
        clearInterval(that.anim);
        that.isOff = true; // en pause
    }

    /*---------------------------------------------------------------------------*/
    /*-----------metode pour le slider ------------------------------------------*/
    /*---------------------------------------------------------------------------*/
    displayNext(nb) {
            this.i = (this.i + this.pictures.length + nb) % this.pictures.length;
            document.getElementById("slideImg").src = this.pictures[this.i];
        }
        /*--------------------------------------------------------------------------------------------------*/
        /*-----------ajout des bouttons Play, Pause, gauche, droite et de la fonction clck -----------------*/
        /*--------------------------------------------------------------------------------------------------*/
    addBtnFct() {
        let that = this;
        document.getElementById("btnPause").addEventListener("click", function(e) { // PAUSE
            that.stopAnim();
        });
        document.getElementById("btnPlay").addEventListener("click", function(e) { // PLAY

            if (that.isOff) {
                that.startAnim();
            }
        });
        document.getElementById("btnLeft").addEventListener("click", function(e) {
            that.displayNext(-1); // chevron gauche
        });
        document.getElementById("btnRight").addEventListener("click", function(e) {
            that.displayNext(1); //chevron droit
        });
        /*---------------------------------------------------------------------------*/
        /*------------------------metode pour le clavier----------------------------*/
        /*--------------------------------------------------------------------------*/
        document.addEventListener("keydown", function(e) {
            switch (e.keyCode) {

                case 37: // touche fleche gauche du clavier
                    that.displayNext(-1);
                    break;

                case 39: // touche fleche droite du clavier
                    that.displayNext(1);
                    break;
            }
        });
    }

}