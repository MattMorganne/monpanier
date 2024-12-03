 
    <style>
        /* Custom height for the carousel */
        .carousel-item img {
            height: 73vh; /* Adjust the height as needed */
            object-fit: cover; /* This ensures the image covers the entire area without stretching */
        }

        /* Media query for tablets */
        @media (max-width: 768px) {
            .carousel-item img {
                height: 400px; /* Adjust height for tablets */
            }
        }

        /* Media query for mobile screens */
        @media (max-width: 576px) {
            .carousel-item img {
                height: 300px; /* Adjust height for mobile */
            }
        }
    </style>
 
 

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://via.placeholder.com/800x400.png?text=First+Slide" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>First Slide</h5>
                <p>This is the first slide caption.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/800x400.png?text=Second+Slide" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second Slide</h5>
                <p>This is the second slide caption.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/800x400.png?text=Third+Slide" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third Slide</h5>
                <p>This is the third slide caption.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
 