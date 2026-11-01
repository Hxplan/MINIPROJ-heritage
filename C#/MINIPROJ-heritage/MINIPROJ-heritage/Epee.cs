using System;

namespace MINIPROJ_heritage
{
    public class Epee : Arme
    {
        #region Champs

        private double _longueurLame;
        private int _tranchant;

        #endregion

        #region Propriétés

        public double LongueurLame
        {
            get { return _longueurLame; }
            set
            {
                if (value <= 0)
                    throw new ArgumentException("La longueur de lame doit être positive.");
                _longueurLame = value;
            }
        }

        public int Tranchant
        {
            get { return _tranchant; }
            set
            {
                if (value < 0)
                    throw new ArgumentException("Le tranchant ne peut pas être négatif.");
                _tranchant = value;
            }
        }

        #endregion

        #region Constructeur

        public Epee(int id, string nom, int degatsBase, double poids, double longueurLame, int tranchant)
            : base(id, nom, degatsBase, poids)
        {
            LongueurLame = longueurLame;
            Tranchant = tranchant;
        }

        #endregion

        #region Méthodes

        public override double CalculerPuissance()
        {
            return base.CalculerPuissance() + _tranchant;
        }

        #endregion

        #region Méthodes redéfinies

        public override string ToString()
        {
            return base.ToString() + " | Épée (Lame: " + _longueurLame + " cm, Tranchant: " + _tranchant + ")";
        }

        #endregion
    }
}
