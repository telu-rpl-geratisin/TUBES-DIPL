import React, { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';

const DetailPage = () => {
  const { id } = useParams();
  const [beasiswa, setBeasiswa] = useState({});
  const [loading, setLoading] = useState(false);

  useEffect(() => {
  	setLoading(true);
  	fetch('https://geratisin-backend.herokuapp.com/beasiswas/'+id)
  	  .then(res => res.json())
  	  .then(res => {
  	  	console.log(res);
  	  	setBeasiswa(res);
  	  	setLoading(false);
  	  });
  }, [])
  return (
  <>
  	{
  	  !loading ?
  	    <div>
  	      <h2>{ beasiswa.namaBeasiswa }</h2>
  	      <p>{ beasiswa.tanggalBerakhir }</p>
  	      <p>{ beasiswa.deskripsi }</p>
  	      <p><a href={beasiswa.link}>Buka Link</a></p>
  	    </div>
  	  : null
  	}
  	<button><Link to="/list">Kembali ke list</Link></button>
  </>
  )
}

export default DetailPage;