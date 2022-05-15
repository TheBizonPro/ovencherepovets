import React from 'react';
import ReactDOM from 'react-dom';

function Header() {
    return (
     <header>
         <div>
             <img src="../logonew.png" className="header__logo"/>
             <ul className="top-menu">
                 <li>Главная</li>
                 <li>О нас</li>
             </ul>
         </div>
         <div className="presentation"></div>
     </header>
    );
}

export default Header;

if (document.getElementById('header')) {
    ReactDOM.render(<Header />, document.getElementById('header'));
}
