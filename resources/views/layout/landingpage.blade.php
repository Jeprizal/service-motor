<style>
    /* Start Landing Page */
    .landing-page .content .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 180px;
        min-height: calc(75vh - 60px);
    }

    @media (max-width: 767px) {
        .landing-page .content .container {
            gap: 0;
            min-height: calc(70vh - 101px);
            justify-content: center;
            flex-direction: column-reverse;
        }
    }

    @media (max-width: 767px) {
        .landing-page .content .info {
            text-align: center;
            margin-bottom: 15px
        }
    }

    .landing-page .content .info h1 {
        color: #5d5d5d;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 48px;
    }

    .landing-page .content .info p {
        margin: 10px 0;
        font-size: 18px;
        line-height: 1.8;
        color: #808080;
    }

    .landing-page .content .info button {
        border: 0;
        border-radius: 20px;
        padding: 12px 30px;
        margin-top: 30px;
        cursor: pointer;
        color: #FFF;
        background-color: #6c63ff;
    }

    .landing-page .content .image img {
        max-width: 100%;
    }

    /* End Landing Page */
</style>
