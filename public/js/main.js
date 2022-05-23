(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);

/*register and gin js popup*/
class Slider extends React.Component {
    render() {
        let { handleChange, value } = this.props;
        return (
            <div className="weight-slider">
                <h2>How Many Plates Do You Need?</h2>
                <input type="range" min="5" max="600" step="5"
                       value={this.props.value}
                       onChange={this.props.handleChange}
                />
                <div>{this.props.value} lbs.</div>
            </div>
        );
    }
};

class Plates extends React.Component {
    renderPlate(plate) {
        let plates = [];
        for (let i = 0; i < plate.count / 2; i++) {
            plates.push(
                <span data-weight={plate.weight}></span>
            );
        }
        return(plates);
    }

    render() {
        let { plates } = this.props;
        return (
            <section>
                <div className="plates-display">
                    <div className="plates-left">
                        {Array.from(this.props.plates).reverse().map(plate => {
                            return this.renderPlate(plate);
                        })}
                    </div>
                    <div className="plates-right">
                        {this.props.plates.map(plate => {
                            return this.renderPlate(plate);
                        })}
                    </div>
                </div>
                <div className="plates-list">
                    <div>Assuming a {this.props.plates[0].weight} lb. bar.</div>
                    <ul>
                        {this.props.plates.map(plate => {
                            if(plate.count) return(<li>{plate.count} &times; {plate.weight} lb. plates</li>);
                            return null;
                        })}
                    </ul>
                </div>
            </section>
        );
    }
}

class App extends React.Component {
    constructor(props) {
        super(props);
        let bar = 45;
        let value = 145 - bar;
        let weights = [45, 25, 15, 10, 5, 2.5];
        let plates = this.setPlates(value, weights.map((w) => {
            return { weight: w, count: 0, greater: w * 2 };
        }));

        this.state = { value, plates };
    }

    handleChange(event) {
        let value = parseInt(event.target.value);
        let plates = this.setPlates(value, this.state.plates);

        this.setState({ value, plates });
    }

    setPlates(weight, plates) {
        weight = weight - 45;
        return plates.map((p, i) => {
            p.count = 0;
            while (weight >= p.greater) {
                p.count += 2;
                weight -= p.greater;
            }
            return p;
        });
    }

    render() {
        return (
            <div className="page-wrap">
                <Slider
                    plates={this.state.plates}
                    value={this.state.value}
                    handleChange={(e) => {this.handleChange(e)}}
                />
                <Plates plates={this.state.plates} />
            </div>
        )
    }

};

ReactDOM.render(
    <App />,
    document.getElementById('app')
);
