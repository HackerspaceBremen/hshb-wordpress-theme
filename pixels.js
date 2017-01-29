function Pixels() {
    this.pixels = '';
    this.pixels_m = '';
    this.height = 10;
    this.width = 10;
    this.paddingx = 2;
    this.paddingy = 2;
    this.def_bg = '#333';
    this.def_fg = '#fff';
    this.id = "pixel";
    this.print_inactive = false;

    this.createNew = function (x, y) {
        this.pixels = new Array(x);
        for (var i = 0; i < x; i++) {
            this.pixels[i] = new Array(y);
            for (var k = 0; k < y; k++) {
                this.pixels[i][k] = '';
            }
        }
    };

    this.setActive = function (x, y, xend, yend, color) {
        xend = xend === undefined ? x + 1 : xend;
        yend = yend === undefined ? y + 1: yend;
        
        for (var i = x; i < xend; i++) 
            for (var k = y; k < yend; k++) 
                this.pixels[i][k] = color === undefined ? 'x' : color ;
    };

    this.print = function () {
        document.write('<div id="' + this.id + '" class="pixels" style="position: relative; height: ' + (this.pixels[0].length * (this.height + this.paddingy) - this.paddingy) + 'px; width: ' + (this.pixels.length * (this.width + this.paddingx) - this.paddingx) + 'px;">');
        
        this.fill();
        
        document.write('</div>');
    };
    
    this.fill = function() {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                if(this.pixels[i][k] === '' && !this.print_inactive) continue;
                $("#" + this.id).append('<div class="pixel ' + (this.pixels[i][k] === '' ? 'inactive' : 'active') + '" id="' + this.id + '_' + i + '-' + k + '" style="position: absolute; display: none; top: ' + k * (this.height + this.paddingy) + 'px; left: ' + i * (this.width + this.paddingx) +'px; height: ' + this.height + 'px; width: ' + this.width + 'px; background-color:' + this.getColor(i, k) + '"></div>');
            }
        }
    }
    
    this.getColor = function (x, y) {
        return (this.pixels[x][y] == 'x' ? this.def_fg : (this.pixels[x][y] === '' ? this.def_bg : this.pixels[x][y]));
    };
    
    this.toggleAll = function() {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).toggle();
            }
        }
    };
    
    this.showLeftRight = function(delay, duration) {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).delay(delay*i).fadeIn(duration);
            }
        }
    };
    
    this.showTopBottom = function(delay, duration) {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).delay(delay*k).fadeIn(duration);
            }
        }
    };
    
    this.showRightLeft = function(delay, duration) {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).delay(delay*(this.pixels.length - i)).fadeIn(duration);
            }
        }
    };
    
    this.showMoveLeft_ = function(delay, iteration) {
        $("#" + this.id).empty();
        
        this.createNew(this.pixels_m.length, this.pixels_m[0].length);
    
        for (var i = 0; i < iteration; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                this.pixels[this.pixels_m.length - (iteration - i) - 1][k] = this.pixels_m[i][k];
            }
        }
        
        this.fill();
        
        this.toggleAll();
        
        if(iteration < this.pixels.length - 1) {
            window.setTimeout(function(obj) { obj.showMoveLeft_(delay, iteration + 1); }, delay, this);
        }
    };
    
    this.showMoveLeft = function(delay) {
                
        this.pixels_m = new Array(this.pixels.length);
        for (var i = 0; i < this.pixels.length; i++) {
            this.pixels_m[i] = new Array(this.pixels[0].length);
            for (var k = 0; k < this.pixels[0].length; k++) {
                this.pixels_m[i][k] = '';
            }
        }
    
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                this.pixels_m[i][k] = this.pixels[i][k];
            }
        }
        
        this.showMoveLeft_(delay, 0);
    };
    
    this.showBottomTop = function(delay, duration) {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).delay(delay*(this.pixels[i].length - k)).slideDown(duration);
            }
        }
    };
    
    this.hintBottomTop = function(delay, duration) {
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                $('#' + this.id + '_' + i + '-' + k).delay(delay*(this.pixels[i].length - k)).slideDown(duration).slideUp(duration);
            }
        }
    };
    
    this.showRandom = function(delay, duration) {
        var actives = [];
        var inactives = [];
        var index_act = 0;
        var index_inact = 0;
        for (var i = 0; i < this.pixels.length; i++) {
            for (var k = 0; k < this.pixels[i].length; k++) {
                if(this.pixels[i][k] === '') {
                    inactives[index_inact] = new Array(2);
                    inactives[index_inact][0] = i;
                    inactives[index_inact][1] = k;
                    index_inact++;
                } else {
                    actives[index_act] = new Array(2);
                    actives[index_act][0] = i;
                    actives[index_act][1] = k;
                    index_act++;
                }
            }
        }
        actives = shuffleArray(actives);
        for(i = 0; i < actives.length; i++) {
            $('#' + this.id + '_' + actives[i][0] + '-' + actives[i][1]).delay(delay*i).show(duration);
        }
        for(i = 0; i < inactives.length; i++) {
            $('#' + this.id + '_' + inactives[i][0] + '-' + inactives[i][1]).delay(delay * actives.length + 0.1 * delay * i + duration).fadeIn(duration);
        }
    };
}

function shuffleArray(o){ //v1.0
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}
