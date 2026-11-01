using System;

namespace MINIPROJ_heritage
{
    public class Arme
    {
        #region Champs

        private int _id;
        private string _nom;
        private int _degatsBase;
        private double _poids;

        #endregion

        #region Propriétés

        public int Id
        {
            get { return _id; }
            set { _id = value; }
        }

        public string Nom
        {
            get { return _nom; }
            set { _nom = value; }
        }

        public int DegatsBase
        {
            get { return _degatsBase; }
            set
            {
                if (value <= 0)
                    throw new ArgumentException("Les dégâts doivent être positifs.");
                _degatsBase = value;
            }
        }

        public double Poids
        {
            get { return _poids; }
            set
            {
                if (value <= 0)
                    throw new ArgumentException("Le poids doit être positif.");
                _poids = value;
            }
        }

        #endregion

        #region Constructeur

        public Arme(int id, string nom, int degatsBase, double poids)
        {
            Id = id;
            Nom = nom;
            DegatsBase = degatsBase;
            Poids = poids;
        }

        #endregion

        #region Méthodes

        public virtual double CalculerPuissance()
        {
            return _degatsBase / _poids;
        }

        #endregion

        #region Méthodes redéfinies

        public override string ToString()
        {
            return "[" + _id + "] " + _nom + " - Dégâts: " + _degatsBase + ", Poids: " + _poids + " kg";
        }

        #endregion
    }
}
