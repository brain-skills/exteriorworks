const iconArray = [
    "fa fa-code", "fa fa-crosshairs", "fa fa-pencil-square-o", "fa fa-crop", "fa fa-comments-o", "fa fa-eye", "fa fa-clock-o",
    "fa fa-cogs", "fa fa-newspaper-o", "fa fa-recycle", "fa fa-refresh", "fa fa-sitemap", "fa fa-search", "fa fa-sort",
    "fa fa-tags", "fa fa-tasks", "fa fa-picture-o", "fa fa-shopping-basket", "fa fa-sliders", "fa fa-toggle-off", "fa fa-wifi",
    "fa fa-spinner", "fa fa-star-o", "fa fa-venus-mars", "fa fa-money", "fa fa-rub", "fa fa-usd", "fa fa-eur", "fa fa-list-ul",
    "fa fa-link", "fa fa-address-card-o", "fa fa-bell-o", "fa fa-at", "fa fa-desktop", "fa fa-folder-open-o", "fa fa-phone",
    "fa fa-users", "fa fa-globe", "fa fa-github", "fa fa-battery-half", "fa fa-bullhorn", "fa fa-envelope", "fa fa-heart",
    "fa fa-code", "fa fa-crosshairs", "fa fa-pencil-square-o", "fa fa-crop", "fa fa-comments-o", "fa fa-eye", "fa fa-clock-o",
    "fa fa-cogs", "fa fa-newspaper-o", "fa fa-recycle", "fa fa-refresh", "fa fa-sitemap", "fa fa-search", "fa fa-sort",
    "fa fa-tags", "fa fa-tasks", "fa fa-picture-o", "fa fa-shopping-basket", "fa fa-sliders", "fa fa-toggle-off", "fa fa-wifi",
    "fa fa-spinner", "fa fa-star-o", "fa fa-venus-mars", "fa fa-money", "fa fa-rub", "fa fa-usd", "fa fa-eur", "fa fa-list-ul",
    "fa fa-link", "fa fa-address-card-o", "fa fa-bell-o", "fa fa-at", "fa fa-desktop", "fa fa-folder-open-o", "fa fa-phone",
    "fa fa-users", "fa fa-globe", "fa fa-github", "fa fa-battery-half", "fa fa-bullhorn", "fa fa-envelope", "fa fa-heart",
];

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

const iconContainers = document.querySelectorAll('.icon-container');

iconContainers.forEach(container => {
    const shuffledIcons = shuffleArray([...iconArray]); // Создаём копию и перемешиваем её
    shuffledIcons.forEach(iconClass => {
        const iconElement = document.createElement('i');
        iconElement.className = `icon ${iconClass}`;
        container.appendChild(iconElement);
    });
});