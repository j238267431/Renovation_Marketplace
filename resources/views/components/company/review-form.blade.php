<div class="col-12">
    <h2 class="h2">Оставить отзыв </h2>

    <form class="pt-3">
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="md-3">
            <label for="rating" class="form-label">Оценка</label>
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>
        </div>
        <div class="mb-3 pt-1">
            <label for="review" class="form-label">Отзыв</label>
            <textarea class="form-control" id="review" rows="8">
Жги правду...
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
