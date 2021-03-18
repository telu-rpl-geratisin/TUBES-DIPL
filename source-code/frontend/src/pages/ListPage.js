import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

const ListPage = () => {
  const [beasiswas, setBeasiswas] = useState([]);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    setLoading(true);
    fetch('http://localhost:1337/beasiswas')
      .then(res => res.json())
      .then(res => {
        console.log(res);
        setBeasiswas(res);
        setLoading(false);
      });
  }, [])

	return (
  <>
	  <h2 className="title">Daftar Beasiswa</h2>
    {
      !loading ?
        <div className="beasiswa-wrapper">
          {
            beasiswas.map((beasiswa, index) => 
              <div key={index} className="beasiswa-item">
                <Link to={`/detail/${beasiswa.id}`}>
                  <ul>
                    <li>{beasiswa.namaBeasiswa}</li>
                    <li>{beasiswa.tanggalBerakhir}</li>
                    <li><a href={beasiswa.link}>Buka Link</a></li>
                  </ul>
                </Link>
              </div>
            )
          }  
        </div>
      : null
    }
  </>
	)
}

export default ListPage;